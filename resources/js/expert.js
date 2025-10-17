import {domDefault, url} from "./helpers/helper";
import {extendDT, getDTAjaxConfig, setInlineHeight} from "./helpers/dtFunctions";
import {dataTable as dtRu} from "./helpers/locales";

$(function (){
  let nominateTable = $('#nominations-table');
  let nominee = window.location.pathname.split("/").pop();

  if (nominateTable.length){
    let link = url + 'expert/nominations/' + nominee;
    let dtNT = nominateTable.DataTable({
      ajax: getDTAjaxConfig(link),
      responsive: true,
      processing: true,
      serverSide: true,
      order: [[0, 'asc']],
      displayLength: 50,
      lengthMenu: [10, 25, 50, 75, 100, 250],
      sDom: domDefault,
      columns: [
        {data: 'id'},
        {data: 'school'},
        {data: 'value'},
        {data: 'link'},
      ],
      columnDefs: [
        {
          targets: -2,
          orderable: false,
        },
        {
          targets: -1,
          orderable: false,
          render: function (data, type, full){
            return '<a href="' + data + '" class="btn btn-primary open-page" title="Посмотреть заявку">Оценить</a>';
          }
        }
      ],
      language: dtRu,
      drawCallback: function () {
        setInlineHeight(dtNT);
        new AcornIcons().replace();
      },
    });
    extendDT(dtNT);
  }
});
