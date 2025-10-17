$(function () {
  let phoneMask = $('.phone-mask')
  if (phoneMask.length) {
    $.each(phoneMask, function (i, phone) {
      let mask = IMask(document.querySelector('#' + $(phone).attr('id')), {
        mask: '+{7}(000)000-00-00',
        lazy: true,
      });
      $(phone).focus(function () {
        mask.updateOptions({lazy: false});
      })
      $(phone).blur(function () {
        let raw = mask.masked.rawInputValue
        let clear = !raw || raw == '7' || raw == '+7('
        mask.updateOptions({lazy: true});
        if (clear) {
          mask.value = '';
        }

      });
    });
  }

  let dateMask = $('.date-mask');
  if (dateMask.length) {
    $.each(dateMask, function (i, date) {
      IMask(document.querySelector('#' + $(date).attr('id')), {
        mask: Date,
        lazy: false,
      });
    });
  }
  /*if ($('#hourInternationalMask') !== null) {
      IMask(document.querySelector('#hourInternationalMask'), {
          mask: '+{46}(000) 000-00-00',
          lazy: false,
      });
  }*/
})
