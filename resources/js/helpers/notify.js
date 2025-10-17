/**
 * Вывод уведомления
 *
 * @param {String} type - Тип (success, error, info, primary)
 * @param {Object} options - Параметры уведомления
 * @param {String} [options.title] - Заголовок уведомления
 * @param {String} options.message - Текст уведомления
 * @param {Function} [options.willClose] - Событие после скрытия
 */
export function get_notify(type, options) {
  let delay = 1500;
  switch (type) {
    case 'success':
      return Swal.fire({
        icon: 'success',
        title: options.title ?? 'Успешно',
        text: options.message,
        showConfirmButton: false,
        timer: delay,
        willClose: options.willClose ?? null,
      });
    case 'error':
      return Swal.fire({
        icon: 'error',
        title: options.title ?? 'Ошибка',
        text: options.message,
        showConfirmButton: false,
        willClose: options.willClose ?? null,
      });

    case 'info':
      return Swal.fire({
        icon: 'info',
        title: options.title ?? 'Информация',
        text: options.message,
        showConfirmButton: true,
        willClose: options.willClose ?? null,
        didOpen: () => {
          Swal.showLoading();
        }
      });
  }
}

/**
 * Вывод сообщения о подтверждении
 * @param {Object} options - Параметры уведомления
 * @param {String} options.title - Заголовок уведомления
 * @param {String} options.message - Текст уведомления
 * @param {String} [options.confirmText=Подтвердить] - Текст кнопки подтверждения
 * @param {String} [options.cancelText=Отмена] - Текст кнопки отмены
 * @return {*}
 */
export function get_confirm_dialog(options) {
  return Swal.fire({
    title: options.title,
    text: options.message,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: 'var(--danger)',
    cancelButtonColor: 'var(--alternate)',
    confirmButtonText: options.confirmText ?? 'Подтвердить',
    cancelButtonText: options.cancelText ?? 'Отмена',
  });
}
