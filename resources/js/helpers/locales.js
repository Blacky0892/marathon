export const apex = {
    locales: [
        {
            "name": "ru",
            "options": {
                "months": ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сетябрь", "Октябрь", "Ноябрь", "Декабрь"],
                "shortMonths": ["Янв", "Фев", "Мар", "Апр", "Май", "Июнь", "Июль", "Авг", "Сен", "Окт", "Ноя", "Дек"],
                "days": ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
                "shortDays": ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
                "toolbar": {
                    "exportToSVG": "Загрузить SVG",
                    "exportToPNG": "Загрузить PNG",
                    "exportToCSV": "Загрузить CSV",
                    "menu": "Меню",
                    "selection": "Выбор",
                    "selectionZoom": "Масштаб",
                    "zoomIn": "Приблизить",
                    "zoomOut": "Отдалить",
                    "pan": "Перетащить",
                    "reset": "Сбросить"
                }
            }
        }
    ],
    defaultLocale: 'ru'
}

export const flatpickr = {
    weekdays: {
        shorthand: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
        longhand: [
            "Воскресенье",
            "Понедельник",
            "Вторник",
            "Среда",
            "Четверг",
            "Пятница",
            "Суббота",
        ],
    },
    months: {
        shorthand: [
            "Янв",
            "Фев",
            "Март",
            "Апр",
            "Май",
            "Июнь",
            "Июль",
            "Авг",
            "Сен",
            "Окт",
            "Ноя",
            "Дек",
        ],
        longhand: [
            "Январь",
            "Февраль",
            "Март",
            "Апрель",
            "Май",
            "Июнь",
            "Июль",
            "Август",
            "Сентябрь",
            "Октябрь",
            "Ноябрь",
            "Декабрь",
        ],
    },
    firstDayOfWeek: 1,
    ordinal: function () {
        return "";
    },
    rangeSeparator: " — ",
    weekAbbreviation: "Нед.",
    scrollTitle: "Прокрутите для увеличения",
    toggleTitle: "Нажмите для переключения",
    amPM: ["ДП", "ПП"],
    yearAriaLabel: "Год",
    time_24hr: true,
}

export const dataTable = {
    "sProcessing":   "Загрузка...",
    "sLengthMenu":   "Показать _MENU_ записей",
    "sZeroRecords":  "Записи отсутствуют.",
    "sInfo":         "Записи с _START_ до _END_ из _TOTAL_ записей",
    "sInfoEmpty":    "Записи с 0 до 0 из 0 записей",
    "sInfoFiltered": "(отфильтровано из _MAX_ записей)",
    "sInfoPostFix":  "",
    "sSearch":       "Поиск:",
    "sUrl":          "",
    "oPaginate": {
        "sFirst": "Первая",
        "sPrevious": "Предыдущая",
        "sNext": "Следующая",
        "sLast": "Последняя"
    },
    "oAria": {
        "sSortAscending":  ": активировать для сортировки столбца по возрастанию",
        "sSortDescending": ": активировать для сортировки столбцов по убыванию"
    },
    "select": {
        "rows": {
            "_": "Выбрано %d строк",
            "0": ""
        }
    },
    "paginate": {
        "previous": '<i class="cs-chevron-left"></i>',
        "next": '<i class="cs-chevron-right"></i>',
    }
}
