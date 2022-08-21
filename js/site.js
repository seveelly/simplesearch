/*eslint no-unused-vars: ["error", { "varsIgnorePattern": "initialize|on[A-Z]*" }]*/
var templates = {
  range: `<div class="field has-addons date dflexc">
  <div class="control">
    <input id="start" type="text" name="range-start" class="input" placeholder="Check In Date">
  </div>
  <div class="control">
    <input id="end" type="text" name="range-end" class="input" placeholder="Check Out Date">
  </div>
</div>`,
};
var beforeShowFns = {
  beforeShowDay(date) {
    if (date.getMonth() == new Date().getMonth()) {
      switch (date.getDate()) {
        case 4:
          return {
            content:
              '<span class="tooltip" data-tooltip="Example tooltip">4</span>',
            classes: "has-background-info",
          };
        case 8:
          return false;
        case 12:
          return "has-text-success";
      }
    }
  },
  beforeShowMonth(date) {
    switch (date.getMonth()) {
      case 6:
        if (date.getFullYear() === new Date().getFullYear()) {
          return { content: "🎉" };
        }
        break;
      case 8:
        return false;
    }
  },
  beforeShowYear(date) {
    switch (date.getFullYear()) {
      case 2017:
        return false;
      case 2020:
        return {
          content:
            '<span class="tooltip is-tooltip-bottom" data-tooltip="Tooltip text">2020</span>',
        };
    }
  },
  beforeShowDecade(date) {
    switch (date.getFullYear()) {
      case 2000:
        return false;
      case 2100:
        return {
          content: "💯",
          classes: "is-background-success",
        };
    }
  },
};
var buttonClass;

const today = new Date().setHours(0, 0, 0, 0);
const defaultOptions = {
  allowOneSidedRange: false,
  autohide: false,
  beforeShowDay: null,
  beforeShowDecade: null,
  beforeShowMonth: null,
  beforeShowYear: null,
  calendarWeeks: false,
  clearBtn: false,
  dateDelimiter: ",",
  datesDisabled: [],
  daysOfWeekDisabled: [],
  daysOfWeekHighlighted: [],
  defaultViewDate: today,
  format: "yyyy-mm-dd",
  language: "en",
  maxDate: null,
  maxNumberOfDates: 1,
  maxView: 3,
  minDate: null,
  nextArrow: "»",
  orientation: "auto",
  pickLevel: 0,
  prevArrow: "«",
  showDaysOfWeek: true,
  showOnClick: true,
  showOnFocus: true,
  startView: 0,
  title: "",
  todayBtn: false,
  todayHighlight: false,
  updateOnBlur: true,
  weekStart: 0,
};
const languages = {
  "ar-DZ": "Arabic-Algeria",
  "ar-tn": "Arabic-Tunisia",
  ar: "Arabic",
  az: "Azerbaijani",
  bg: "Bulgarian",
  bm: "Bamanankan",
  bn: "Bengali (Bangla)",
  br: "Breton",
  bs: "Bosnian",
  ca: "Catalan",
  cs: "Czech",
  cy: "Welsh",
  da: "Danish",
  de: "German",
  el: "Greek",
  "en-AU": "Australian English",
  "en-CA": "Canadian English",
  "en-GB": "British English",
  "en-IE": "Irish English",
  "en-NZ": "New Zealand English",
  "en-ZA": "South African English",
  eo: "Esperanto",
  es: "Spanish",
  et: "Estonian",
  eu: "Basque",
  fa: "Persian",
  fi: "Finnish",
  fo: "Faroese",
  "fr-CH": "French (Switzerland)",
  fr: "French",
  gl: "Galician",
  he: "Hebrew",
  hi: "Hindi",
  hr: "Croatian",
  hu: "Hungarian",
  hy: "Armenian",
  id: "Bahasa",
  is: "Icelandic",
  "it-CH": "Italian (Switzerland)",
  it: "Italian",
  ja: "Japanese",
  ka: "Georgian",
  kk: "Kazakh",
  km: "Khmer",
  ko: "Korean",
  lt: "Lithuanian",
  lv: "Latvian",
  me: "Montenegrin",
  mk: "Macedonian",
  mn: "Mongolian",
  mr: "Marathi",
  ms: "Malay",
  "nl-BE": "Belgium-Dutch",
  nl: "Dutch",
  no: "Norwegian",
  oc: "Occitan",
  pl: "Polish",
  "pt-BR": "Brazilian",
  pt: "Portuguese",
  ro: "Romanian",
  ru: "Russian",
  si: "Sinhala",
  sk: "Slovak",
  sl: "Slovene",
  sq: "Albanian",
  "sr-latn": "Serbian latin",
  sr: "Serbian cyrillic",
  sv: "Swedish",
  sw: "Swahili",
  ta: "Tamil",
  tg: "Tajik",
  th: "Thai",
  tk: "Turkmen",
  tr: "Turkish",
  uk: "Ukrainian",
  "uz-cyrl": "Uzbek cyrillic",
  "uz-latn": "Uzbek latin",
  vi: "Vietnamese",
  "zh-CN": "Simplified Chinese",
  "zh-TW": "Traditional Chinese",
};
const range = document.createRange();
const sandbox = document.getElementById("sandbox");
const options = document.getElementById("options");
const jsonFields = ["datesDisabled"];

function parseHTML(html) {
  return range.createContextualFragment(html);
}

function getBeforeShowFnSrc(name) {
  return beforeShowFns[name].toString();
}

function switchPicker(type) {
  const options = buttonClass ? { buttonClass } : {};
  if (window.demoPicker) {
    const currentOpts =
      window.demoPicker instanceof DateRangePicker
        ? window.demoPicker.datepickers[0]._options
        : window.demoPicker._options;
    Object.keys(defaultOptions).reduce((opts, key) => {
      if (
        key in currentOpts &&
        String(currentOpts[key] !== String(defaultOptions[key]))
      ) {
        opts[key] = currentOpts[key];
      }
      return opts;
    }, options);

    window.demoPicker.destroy();
    sandbox.removeChild(sandbox.firstChild);
  }
  sandbox.appendChild(parseHTML(templates[type]));

  const el = sandbox.querySelector(".date");
  window.demoPicker =
    type === "range"
      ? new DateRangePicker(el, options)
      : new Datepicker(el, options);
}
