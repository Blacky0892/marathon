import {url} from "./helper";

export function setInlineHeight(table) {
  if (table) {
    return;
  }
  const pageLength = table.page.len();
  $('.dataTables_scrollBody').css('height', 62 * pageLength + 'px');
}

/**
 * Расширение плагина DataTable
 * @param {DataTable} table
 * @return {DatatableExtend}
 */
export function extendDT(table) {
  return new DatatableExtend({
    datatable: table,
  });
}

/**
 * Ajax для плагина DataTable
 * @param {String} link
 */
export function getDTAjaxConfig(link){
  return {
    "type": "GET",
    "url": link,
    "error": function(xhr, error, thrown) {
      if(xhr.status === 401){
        location.href = url + 'login'
      }
    }
  }
}
