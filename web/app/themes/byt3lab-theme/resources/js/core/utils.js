// src/js/core/utils.js
export const qs = (el) => document.querySelector(el);
export const qsa = (el) => document.querySelectorAll(el);

export const addClass = (el, className) => {
  el.classList.add(className);
};

export const removeClass = (el, className) => {
  el.classList.remove(className);
};

export const toggleClass = (el, className) => {
  el.classList.toggle(className);
};

export const hasClass = (el, className) => {
  return el.classList.contains(className);
};