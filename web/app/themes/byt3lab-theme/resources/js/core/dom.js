// src/js/core/dom.js
export function on(event, selector, callback) {
  document.addEventListener(event, (e) => {
    if (e.target.matches(selector)) {
      callback(e);
    }
  });
}