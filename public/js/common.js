function openPopup(_url) {
  var size = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
  window.open(_url, '_blank', size);
}
