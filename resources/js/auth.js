import {getNewIterationId, addFullClassToSelect2, selectSchoolAjax, selectDefault, url} from "./helpers/helper";

$(function () {
  //let selects = $('.select2Default');

  // если есть кнопка добавления ОО - мы на странице регистрации
  let addBtn = $('.addSchool');
  if (addBtn.length) {
    let sel = $('.schoolSelect');

    // Селект2 с поиском
    let selectOptions = {
      theme: 'bootstrap4',
      language: 'ru',
      allowClear: true,
      placeholder: '',
      ajax: selectSchoolAjax,
      minimumInputLength: 1,
    }
    // Добавление класса для плавающего лейбла
    sel.select2(selectOptions).on('select2:open', function (e) {
      $(this).addClass('show');
    })
      .on('select2:close', function (e) {
        addFullClassToSelect2($(this));
        $(this).removeClass('show');
      })
      .on('select2:select', function (e) {
        let id = e.params.data.id;
        // После нахождения школы, заполнение прочих полей
        $.get(url + 'api/schools/info/' + id, function (resp) {
          $('#hSchool-0').val(resp.name)
          $('#hSchoolId-0').val(resp.id)
          $('#area-0').val(resp.area)
          $('#mrsd-0').val(resp.mrsd)
          $('#shortName-0').val(resp.short_name)
        });
      });

    // Если были ошибки, заполняем ОО из скрытых
    let hiddens = $('[id^="hSchool-"]');
    $.each(hiddens, function (i, item){
      if($(item).val() !== ''){
        $('#school-'+i).append('<option value="'+$('#hSchoolId-'+i).val()+'" selected>'+$('#hSchool-'+i).val()+'</option>').trigger('change');
      }
    });

    addFullClassToSelect2(sel);

    /**
     * Добавление нового ОО
     */
    addBtn.click(function () {
      // Последний объект со школой
      let school = $('.schools').last();
      // Номер итерации
      let iteration = school.data('school');
      // Выключаем селект2 для корректного копирования
      school.find('select').select2('destroy');
      // Копируем объект
      let copy = school.clone();
      // Включаем селект2 обратно
      school.find('select').select2(selectOptions);
      addFullClassToSelect2(school.find('select'));
      // Прибавляем итерацию
      iteration++;
      // Проводим изменения в скопированном объекте. Обновляем
      // name, id полей, очищаем поля
      copy.data('school', iteration).attr('data-school', iteration);
      copy.find('.number').text(iteration + 1);
      copy.find('.deleteSchool').data('school', iteration).attr('data-school', iteration).removeClass('d-none');

      copy.find('select, input').val('').attr('id', function (){
        let id = $(this).attr('id');
        return getNewIterationId(id, iteration);
      }).attr('name', function (){
        let name = $(this).attr('name');
        return getNewIterationId(name, iteration, true);
      }).removeClass('is-invalid');

      copy.find('label').attr('for', function (){
        let id = $(this).attr('for');
        return getNewIterationId(id, iteration);
      });

      copy.find('.invalid-feedback').remove();
      copy.find('select').select2(selectOptions).on('select2:open', function (e) {
        $(this).addClass('show');
      }).on('select2:close', function (e) {
        addFullClassToSelect2($(this));
        $(this).removeClass('show');
      }).on('select2:select', function (e) {
        let id = e.params.data.id;
        $.get(url + 'api/schools/info/' + id, function (resp) {
          $('#hSchool-'+iteration).val(resp.name)
          $('#hSchoolId-'+iteration).val(resp.id)
          $('#area-'+iteration).val(resp.area)
          $('#mrsd-'+iteration).val(resp.mrsd)
          $('#shortName-'+iteration).val(resp.short_name)
        });
      });

      school.after(copy);
    });

    /**
     * Удаление ОО
     */
    $(document).on('click', '.deleteSchool', function (){
      let iteration = $(this).data('school');
      $('.schools[data-school="'+iteration+'"]').remove();
    });
  }
});
