/**
 * Template Name: NiceAdmin - v2.2.2
 * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */

(function () {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim();
    if (all) {
      return [...document.querySelectorAll(el)];
    } else {
      return document.querySelector(el);
    }
  };

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    if (all) {
      select(el, all).forEach((e) => e.addEventListener(type, listener));
    } else {
      select(el, all).addEventListener(type, listener);
    }
  };

  /**
   * Easy on scroll event listener
   */
  const onscroll = (el, listener) => {
    el.addEventListener("scroll", listener);
  };

  /**
   * Sidebar toggle
   */
  if (select(".toggle-sidebar-btn")) {
    on("click", ".toggle-sidebar-btn", function (e) {
      select("body").classList.toggle("toggle-sidebar");
    });
  }

  /**
   * Search bar toggle
   */
  if (select(".search-bar-toggle")) {
    on("click", ".search-bar-toggle", function (e) {
      select(".search-bar").classList.toggle("search-bar-show");
    });
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select("#navbar .scrollto", true);
  const navbarlinksActive = () => {
    let position = window.scrollY + 200;
    navbarlinks.forEach((navbarlink) => {
      if (!navbarlink.hash) return;
      let section = select(navbarlink.hash);
      if (!section) return;
      if (
        position >= section.offsetTop &&
        position <= section.offsetTop + section.offsetHeight
      ) {
        navbarlink.classList.add("active");
      } else {
        navbarlink.classList.remove("active");
      }
    });
  };
  window.addEventListener("load", navbarlinksActive);
  onscroll(document, navbarlinksActive);

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select("#header");
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add("header-scrolled");
      } else {
        selectHeader.classList.remove("header-scrolled");
      }
    };
    window.addEventListener("load", headerScrolled);
    onscroll(document, headerScrolled);
  }

  /**
   * Back to top button
   */
  let backtotop = select(".back-to-top");
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add("active");
      } else {
        backtotop.classList.remove("active");
      }
    };
    window.addEventListener("load", toggleBacktotop);
    onscroll(document, toggleBacktotop);
  }

  /**
   * Initiate tooltips
   */
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  /**
   * Initiate quill editors
   */
  if (select(".quill-editor-default")) {
    new Quill(".quill-editor-default", {
      theme: "snow",
    });
  }

  if (select(".quill-editor-bubble")) {
    new Quill(".quill-editor-bubble", {
      theme: "bubble",
    });
  }

  if (select(".quill-editor-full")) {
    new Quill(".quill-editor-full", {
      modules: {
        toolbar: [
          [
            {
              font: [],
            },
            {
              size: [],
            },
          ],
          ["bold", "italic", "underline", "strike"],
          [
            {
              color: [],
            },
            {
              background: [],
            },
          ],
          [
            {
              script: "super",
            },
            {
              script: "sub",
            },
          ],
          [
            {
              list: "ordered",
            },
            {
              list: "bullet",
            },
            {
              indent: "-1",
            },
            {
              indent: "+1",
            },
          ],
          [
            "direction",
            {
              align: [],
            },
          ],
          ["link", "image", "video"],
          ["clean"],
        ],
      },
      theme: "snow",
    });
  }

  /**
   * Initiate TinyMCE Editor
   */

  var useDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;

  tinymce.init({
    selector: "textarea.tinymce-editor",
    plugins:
      "print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons",
    imagetools_cors_hosts: ["picsum.photos"],
    menubar: "file edit view insert format tools table help",
    toolbar:
      "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl",
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    link_list: [
      {
        title: "My page 1",
        value: "https://www.tiny.cloud",
      },
      {
        title: "My page 2",
        value: "http://www.moxiecode.com",
      },
    ],
    image_list: [
      {
        title: "My page 1",
        value: "https://www.tiny.cloud",
      },
      {
        title: "My page 2",
        value: "http://www.moxiecode.com",
      },
    ],
    image_class_list: [
      {
        title: "None",
        value: "",
      },
      {
        title: "Some class",
        value: "class-name",
      },
    ],
    importcss_append: true,
    file_picker_callback: function (callback, value, meta) {
      /* Provide file and text for the link dialog */
      if (meta.filetype === "file") {
        callback("https://www.google.com/logos/google.jpg", {
          text: "My text",
        });
      }

      /* Provide image and alt text for the image dialog */
      if (meta.filetype === "image") {
        callback("https://www.google.com/logos/google.jpg", {
          alt: "My alt text",
        });
      }

      /* Provide alternative source and posted for the media dialog */
      if (meta.filetype === "media") {
        callback("movie.mp4", {
          source2: "alt.ogg",
          poster: "https://www.google.com/logos/google.jpg",
        });
      }
    },
    templates: [
      {
        title: "New Table",
        description: "creates a new table",
        content:
          '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
      },
      {
        title: "Starting my story",
        description: "A cure for writers block",
        content: "Once upon a time...",
      },
      {
        title: "New list with dates",
        description: "New List with dates",
        content:
          '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
      },
    ],
    template_cdate_format: "[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]",
    template_mdate_format: "[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]",
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar:
      "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: "sliding",
    contextmenu: "link image imagetools table",
    skin: useDarkMode ? "oxide-dark" : "oxide",
    content_css: useDarkMode ? "dark" : "default",
    content_style:
      "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
  });

  /**
   * Initiate Bootstrap validation check
   */
  var needsValidation = document.querySelectorAll(".needs-validation");

  Array.prototype.slice.call(needsValidation).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });

  /**
   * Initiate Datatables
   */

  function newexportaction(e, dt, button, config) {
    var self = this;
    var oldStart = dt.settings()[0]._iDisplayStart;
    dt.one("preXhr", function (e, s, data) {
      // Just this once, load all data from the server...
      data.start = 0;
      data.length = -1;
      dt.one("preDraw", function (e, settings) {
        // Call the original action function
        if (button[0].className.indexOf("buttons-copy") >= 0) {
          $.fn.dataTable.ext.buttons.copyHtml5.action.call(
            self,
            e,
            dt,
            button,
            config
          );
        } else if (button[0].className.indexOf("buttons-excel") >= 0) {
          $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)
            ? $.fn.dataTable.ext.buttons.excelHtml5.action.call(
                self,
                e,
                dt,
                button,
                config
              )
            : $.fn.dataTable.ext.buttons.excelFlash.action.call(
                self,
                e,
                dt,
                button,
                config
              );
        } else if (button[0].className.indexOf("buttons-csv") >= 0) {
          $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config)
            ? $.fn.dataTable.ext.buttons.csvHtml5.action.call(
                self,
                e,
                dt,
                button,
                config
              )
            : $.fn.dataTable.ext.buttons.csvFlash.action.call(
                self,
                e,
                dt,
                button,
                config
              );
        } else if (button[0].className.indexOf("buttons-pdf") >= 0) {
          $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config)
            ? $.fn.dataTable.ext.buttons.pdfHtml5.action.call(
                self,
                e,
                dt,
                button,
                config
              )
            : $.fn.dataTable.ext.buttons.pdfFlash.action.call(
                self,
                e,
                dt,
                button,
                config
              );
        } else if (button[0].className.indexOf("buttons-print") >= 0) {
          $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
        }
        dt.one("preXhr", function (e, s, data) {
          // DataTables thinks the first item displayed is index 0, but we're not drawing that.
          // Set the property to what it was before exporting.
          settings._iDisplayStart = oldStart;
          data.start = oldStart;
        });
        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
        setTimeout(dt.ajax.reload, 0);
        // Prevent rendering of the full data to the DOM
        return false;
      });
    });
    // Requery the server with the new one-time export settings
    dt.ajax.reload();
  }

  const base_url = document.getElementById("base_url").value;
  const datatables = select(".datatable", true);

  datatables.forEach((datatable) => {
    let ssr_url = datatable.getAttribute("data-ssr");
    let delete_url = datatable.getAttribute("data-delete");
    let exportable = datatable.getAttribute("data-export");
    let selectable = datatable.getAttribute("data-select");
    let isExportable = exportable && exportable == "true";
    let isSelectable = selectable && selectable == "true";
    let columnsLength = datatable.querySelectorAll('th').length;
    let columns = [];

    for(let i = 0; i < columnsLength; i++) {
      columns[i] = {
        orderable: i + 1 === columnsLength ? false : true,
      };
    }

    $.fn.dataTable.ext.buttons.remove = {
      className: 'buttons-remove',
      action: function ( e, dt, node, config ) {
        const ids = dt.rows({ selected: true }).data().pluck(0).toArray();

        const url = delete_url;
        const form = $('<form action="' + url + '" method="post">' +
          '<input type="hidden" name="contact_ids" value="' + ids.join(',') + '" />' +
          '</form>');
        $('body').append(form);
        form.submit();
      }
  };

  $(datatable).DataTable({
      dom: isExportable ? "Blfrtip" : "Rlfrtip",
      stateSave: true,
      responsive: true,
      order: [[ 0, 'desc' ]],
      columns: columns,
      buttons: isExportable
        ? [
            {
              extend: "excel",
              titleAttr: "Excel",
              action: newexportaction,
            },
            {
              extend: "csv",
              titleAttr: "CSV",
              action: newexportaction,
            },
            {
              extend: "pdf",
              titleAttr: "PDF",
              orientation: 'landscape',
              action: newexportaction,
            },
            isSelectable ? {
              extend: 'remove',
              text: 'Excluir Selecionados'
            } : null,
          ]
        : null,
      select: isSelectable ? {
          style:    'os',
          selector: 'td:first-child',
          blurable: true
      } : null,
      processing: !!ssr_url,
      serverSide: !!ssr_url,
      ajax: !!ssr_url
        ? {
            url: ssr_url,
            type: "POST",
          }
        : null,
    });
  });
  

  /**
   * Autoresize echart charts
   */
  const mainContainer = select("#main");
  if (mainContainer) {
    setTimeout(() => {
      new ResizeObserver(function () {
        select(".echart", true).forEach((getEchart) => {
          echarts.getInstanceByDom(getEchart).resize();
        });
      }).observe(mainContainer);
    }, 200);
  }

  $('[data-toggle="confirmation"').confirm({
    content: "Esse processo é irreversível.",
    theme: "bootstrap",
    buttons: {
      excluir: {
        btnClass: "btn-danger",
        action: function () {
          location.href = this.$target.attr("href");
        },
      },
      cancelar: function () {
        this.close();
      },
    },
  });
})();

function handleConfirmation(event) {
  event.preventDefault();
  $.confirm({
    title: $(event.target).attr("data-title"),
    content: "Esse processo é irreversível.",
    theme: "bootstrap",
    buttons: {
      excluir: {
        btnClass: "btn-danger",
        action: function () {
          location.href = $(event.target).attr("href");
        },
      },
      cancelar: function () {
        this.close();
      },
    },
  });
}
