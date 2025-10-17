import {domDefault, url} from "./helpers/helper";
import {extendDT, getDTAjaxConfig, setInlineHeight} from "./helpers/dtFunctions";
import {dataTable as dtRu} from "./helpers/locales";

$(function () {
  let ordersTable = $('#orders-table');

  if (ordersTable.length) {
    let link = url + 'moderator/orders/table';
    let dtOT = ordersTable.DataTable({
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
        {data: 'name'},
        {data: 'school'},
        //{data: 'status'},
        {data: 'link'},
      ],
      columnDefs: [
        {
          targets: -1,
          orderable: false,
          render: function (data, type, full) {
            return '<a href="' + data + '" class="btn btn-icon btn-icon-only btn-primary open-page" title="Посмотреть заявку"><i data-acorn-icon="eye"></i></a>';
          }
        }
      ],
      language: dtRu,
      drawCallback: function () {
        setInlineHeight(dtOT);
        new AcornIcons().replace();
      },
    });
    extendDT(dtOT);
  }

  let stageTable = $('#stage-table');

  if (stageTable.length) {
    let stage = stageTable.data('stage');
    let link = url + 'moderator/stage/' + stage + '/table/';
    let dtST = stageTable.DataTable({
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
        {data: 'name'},
        {data: 'school'},
        //{data: 'status'},
        {data: 'link'},
      ],
      columnDefs: [
        {
          targets: -1,
          orderable: false,
          render: function (data, type, full) {
            return '<a href="' + data + '" class="open-page">' + data + '</a>';
          }
        }
      ],
      language: dtRu,
      drawCallback: function () {
        setInlineHeight(dtST);
        new AcornIcons().replace();
      },
    });
    extendDT(dtST);
  }

  let nominateTable = $('#nominations-table');
  let nominee = window.location.pathname.split("/").pop();

  if (nominateTable.length) {
    let link = url + 'moderator/nominations/' + nominee;
    let dtNT = nominateTable.DataTable({
      ajax: getDTAjaxConfig(link),
      responsive: true,
      processing: true,
      serverSide: true,
      sortable: false,
      displayLength: 50,
      order: [[4, 'desc']],
      lengthMenu: [10, 25, 50, 75, 100, 250],
      sDom: domDefault,
      columns: [
        {data: 'id'},
        {data: 'mrsd'},
        {data: 'area'},
        {data: 'school'},
        {data: 'value'},
        {data: 'valueFull'},
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
          render: function (data, type, full) {
            return '<a href="' + data + '" class="btn btn-primary open-page" title="Посмотреть заявку">Подробная информация</a>';
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
