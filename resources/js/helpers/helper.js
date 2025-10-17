/**
 * Применение фильтра для таблицы
 * @param {jquery} table Таблица
 * @param {number} i Номер колонки
 * @param {*} val Значение, по которому происходит фильтрация
 */
export function filterColumn(table, i, val) {
    table.DataTable().column(i).search(val, false, true).draw();
}

/**
 * @property {String} theme
 * @property {String} language
 * @property {Number} minimumResultsForSearch
 * @property {String} placeholder
 */
export const selectDefault = {
    theme: 'bootstrap4',
    language: 'ru',
    minimumResultsForSearch: Infinity,
    placeholder: ''
}

export const datePickerDefault = {
    dateFormat: 'd.m.Y',
    locale: 'ru',
    allowInput: true,
}

export const url = $('base').data('href');

export const domDefault = '<"row"<"col-sm-12 d-flex justify-content-end"i>><"row"<"col-sm-12"<"table-container"t>r>><"row"<"col-sm-2"i><"col-sm-10 d-flex justify-content-end"p>>';

/**
 * Проверка, что дата валидна
 * @param {String} s
 * @returns {boolean}
 */
export function isValidDate(s) {
  let bits = s.split('.');
  let d = new Date(bits[2] + '-' + bits[1] + '-' + bits[0]);
  return !!(d && (d.getMonth() + 1) == bits[1] && d.getDate() == Number(bits[0]));
}

/**
 * Получение нового id
 * @param {String} id
 * @param {Number} iteration
 * @param {Boolean} [isName=false]
 * @returns {string}
 */
export function getNewIterationId(id, iteration, isName)
{
  if(typeof isName === 'undefined') isName = false;
  let split = '-';
  if(isName){
    split = '[';
  }
  if(typeof id == 'undefined') return id;
  let nId = id.split(split)[0];

  let result = nId + split + iteration;
  if(isName){
    result += ']';
  }
  return result;
}

/**
 * Добавление класса для плавающего селекта
 * @param {jquery} el
 */
export function addFullClassToSelect2(el)
{
  if (el.val() !== '' && el.val() !== null) {
    el.parent().find('.select2.select2-container').addClass('full');
  } else {
    el.parent().find('.select2.select2-container').removeClass('full');
  }
}

function getSchoolAjax(variables) {
  return {
    delay: 150,
    url: url + 'api/schools/search',
    data: function (params) {
      let ret = {
        search: params.term,
        page: params.page
      }
      if (typeof variables !== "undefined") {
        ret = {...ret, ...variables}
      }
      return ret
    },
    dataType: 'json',
    processResults: function (data, params) {
      params.page = params.page || 1;
      return {
        results: data.items,
        pagination: {
          more: (params.page * 25) < data.count
        }
      };
    },
    cache: true,
  }
}

export const selectSchoolAjax = getSchoolAjax()
