document.addEventListener("DOMContentLoaded", function (e) {
    config.colors.borderColor, config.colors.bodyBg, config.colors.headingColor;
    let t = document.querySelector(".datatables-users"), r = "app-user-view-account.html", n = {
        1: {title: "Pending", class: "bg-label-warning"},
        2: {title: "Active", class: "bg-label-success"},
        3: {title: "Inactive", class: "bg-label-secondary"}
    }, a = $(".select2"), s;
    if (a.length && (s = a).wrap('<div class="position-relative"></div>').select2({
        placeholder: "Select Country",
        dropdownParent: s.parent()
    }), t) {
        let a = new DataTable(t, {
            ajax: assetsPath + "json/user-list.json",
            columns: [{data: "id"}, {
                data: "id",
                orderable: !1,
                render: DataTable.render.select()
            }, {data: "full_name"}, {data: "role"}, {data: "current_plan"}, {data: "billing"}, {data: "status"}, {data: "action"}],
            columnDefs: [{
                className: "control",
                searchable: !1,
                orderable: !1,
                responsivePriority: 2,
                targets: 0,
                render: function (e, t, a, s) {
                    return ""
                }
            }, {
                targets: 1,
                orderable: !1,
                searchable: !1,
                responsivePriority: 4,
                checkboxes: !0,
                checkboxes: {selectAllRender: '<input type="checkbox" class="form-check-input">'},
                render: function () {
                    return '<input type="checkbox" class="dt-checkboxes form-check-input">'
                }
            }, {
                targets: 2, responsivePriority: 3, render: function (e, t, a, s) {
                    var n = a.full_name, o = a.email, a = a.avatar;
                    return '<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-4">' + (a ? '<img src="' + assetsPath + "img/avatars/" + a + '" alt="Avatar" class="rounded-circle">' : '<span class="avatar-initial rounded-circle bg-label-' + ["success", "danger", "warning", "info", "dark", "primary", "secondary"][Math.floor(6 * Math.random())] + '">' + (a = (((a = (n.match(/\b\w/g) || []).map(e => e.toUpperCase())).shift() || "") + (a.pop() || "")).toUpperCase()) + "</span>") + '</div></div><div class="d-flex flex-column"><a href="' + r + '" class="text-heading text-truncate"><span class="fw-medium">' + n + "</span></a><small>" + o + "</small></div></div>"
                }
            }, {
                targets: 3, render: function (e, t, a, s) {
                    a = a.role;
                    return "<span class='text-truncate d-flex align-items-center text-heading'>" + ({
                        Subscriber: '<i class="icon-base bx bx-crown text-primary me-2"></i>',
                        Author: '<i class="icon-base bx bx-edit text-warning me-2"></i>',
                        Maintainer: '<i class="icon-base bx bx-user text-success me-2"></i>',
                        Editor: '<i class="icon-base bx bx-pie-chart-alt text-info me-2"></i>',
                        Admin: '<i class="icon-base bx bx-desktop text-danger me-2"></i>'
                    }[a] || "") + a + "</span>"
                }
            }, {
                targets: 4, render: function (e, t, a, s) {
                    return '<span class="text-heading">' + a.current_plan + "</span>"
                }
            }, {
                targets: 6, render: function (e, t, a, s) {
                    a = a.status;
                    return '<span class="badge ' + n[a].class + '" text-capitalized>' + n[a].title + "</span>"
                }
            }, {
                targets: -1, title: "Actions", searchable: !1, orderable: !1, render: (e, t, a, s) => `
              <div class="d-flex align-items-center">
                <a href="javascript:;" class="btn btn-icon delete-record">
                  <i class="icon-base bx bx-trash icon-md"></i>
                </a>
                <a href="${r}" class="btn btn-icon">
                  <i class="icon-base bx bx-show icon-md"></i>
                </a>
                <a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="icon-base bx bx-dots-vertical-rounded icon-md"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                  <a href="javascript:;" class="dropdown-item">Edit</a>
                  <a href="javascript:;" class="dropdown-item">Suspend</a>
                </div>
              </div>
            `
            }],
            select: {style: "multi", selector: "td:nth-child(2)"},
            order: [[2, "desc"]],
            layout: {
                topStart: {
                    rowClass: "row mx-3 my-0 justify-content-between",
                    features: [{pageLength: {menu: [10, 25, 50, 100], text: "_MENU_"}}]
                },
                topEnd: {
                    features: [{search: {placeholder: "Search User", text: "_INPUT_"}}, {
                        buttons: [{
                            extend: "collection",
                            className: "btn btn-label-secondary dropdown-toggle",
                            text: '<span class="d-flex align-items-center gap-2"><i class="icon-base bx bx-export icon-sm"></i> <span class="d-none d-sm-inline-block">Export</span></span>',
                            buttons: [{
                                extend: "print",
                                text: '<span class="d-flex align-items-center"><i class="icon-base bx bx-printer me-2"></i>Print</span>',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [3, 4, 5, 6, 7], format: {
                                        body: function (e, t, a) {
                                            if (e.length <= 0) return e;
                                            e = (new DOMParser).parseFromString(e, "text/html").body.childNodes;
                                            let s = "";
                                            return e.forEach(e => {
                                                e.classList && e.classList.contains("user-name") ? s += e.lastChild.firstChild.textContent : s += e.textContent || e.innerText || ""
                                            }), s
                                        }
                                    }
                                },
                                customize: function (e) {
                                    e.document.body.style.color = config.colors.headingColor, e.document.body.style.borderColor = config.colors.borderColor, e.document.body.style.backgroundColor = config.colors.bodyBg;
                                    e = e.document.body.querySelector("table");
                                    e.classList.add("compact"), e.style.color = "inherit", e.style.borderColor = "inherit", e.style.backgroundColor = "inherit"
                                }
                            }, {
                                extend: "csv",
                                text: '<span class="d-flex align-items-center"><i class="icon-base bx bx-file me-2"></i>Csv</span>',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [3, 4, 5, 6, 7], format: {
                                        body: function (e, t, a) {
                                            if (e.length <= 0) return e;
                                            e = (new DOMParser).parseFromString(e, "text/html").body.childNodes;
                                            let s = "";
                                            return e.forEach(e => {
                                                e.classList && e.classList.contains("user-name") ? s += e.lastChild.firstChild.textContent : s += e.textContent || e.innerText || ""
                                            }), s
                                        }
                                    }
                                }
                            }, {
                                extend: "excel",
                                text: '<span class="d-flex align-items-center"><i class="icon-base bx bxs-file-export me-2"></i>Excel</span>',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [3, 4, 5, 6, 7], format: {
                                        body: function (e, t, a) {
                                            if (e.length <= 0) return e;
                                            e = (new DOMParser).parseFromString(e, "text/html").body.childNodes;
                                            let s = "";
                                            return e.forEach(e => {
                                                e.classList && e.classList.contains("user-name") ? s += e.lastChild.firstChild.textContent : s += e.textContent || e.innerText || ""
                                            }), s
                                        }
                                    }
                                }
                            }, {
                                extend: "pdf",
                                text: '<span class="d-flex align-items-center"><i class="icon-base bx bxs-file-pdf me-2"></i>Pdf</span>',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [3, 4, 5, 6, 7], format: {
                                        body: function (e, t, a) {
                                            if (e.length <= 0) return e;
                                            e = (new DOMParser).parseFromString(e, "text/html").body.childNodes;
                                            let s = "";
                                            return e.forEach(e => {
                                                e.classList && e.classList.contains("user-name") ? s += e.lastChild.firstChild.textContent : s += e.textContent || e.innerText || ""
                                            }), s
                                        }
                                    }
                                }
                            }, {
                                extend: "copy",
                                text: '<i class="icon-base bx bx-copy me-1"></i>Copy',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [3, 4, 5, 6, 7], format: {
                                        body: function (e, t, a) {
                                            if (e.length <= 0) return e;
                                            e = (new DOMParser).parseFromString(e, "text/html").body.childNodes;
                                            let s = "";
                                            return e.forEach(e => {
                                                e.classList && e.classList.contains("user-name") ? s += e.lastChild.firstChild.textContent : s += e.textContent || e.innerText || ""
                                            }), s
                                        }
                                    }
                                }
                            }]
                        }, {
                            text: '<i class="icon-base bx bx-plus icon-sm me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Add New User</span>',
                            className: "add-new btn btn-primary",
                            attr: {"data-bs-toggle": "offcanvas", "data-bs-target": "#offcanvasAddUser"}
                        }]
                    }]
                },
                bottomStart: {rowClass: "row mx-3 justify-content-between", features: ["info"]},
                bottomEnd: {paging: {firstLast: !1}}
            },
            language: {
                sLengthMenu: "_MENU_",
                search: "",
                searchPlaceholder: "Search User",
                paginate: {
                    next: '<i class="icon-base bx bx-chevron-right icon-18px"></i>',
                    previous: '<i class="icon-base bx bx-chevron-left icon-18px"></i>'
                }
            },
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function (e) {
                            return "Details of " + e.data().full_name
                        }
                    }), type: "column", renderer: function (e, t, a) {
                        var s, n, o, a = a.map(function (e) {
                            return "" !== e.title ? `<tr data-dt-row="${e.rowIndex}" data-dt-column="${e.columnIndex}">
                      <td>${e.title}:</td>
                      <td>${e.data}</td>
                    </tr>` : ""
                        }).join("");
                        return !!a && ((s = document.createElement("div")).classList.add("table-responsive"), n = document.createElement("table"), s.appendChild(n), n.classList.add("table"), (o = document.createElement("tbody")).innerHTML = a, n.appendChild(o), s)
                    }
                }
            },
            initComplete: function () {
                let r = this.api();
                var e = (e, t, a, s) => {
                    let n = r.column(e), o = document.createElement("select");
                    o.id = a, o.className = "form-select text-capitalize", o.innerHTML = `<option value="">${s}</option>`, document.querySelector(t).appendChild(o), o.addEventListener("change", () => {
                        var e = o.value ? `^${o.value}$` : "";
                        n.search(e, !0, !1).draw()
                    }), Array.from(new Set(n.data().toArray())).sort().forEach(e => {
                        var t = document.createElement("option");
                        t.value = e, t.textContent = e, o.appendChild(t)
                    })
                };
                e(3, ".user_role", "UserRole", "Select Role"), e(4, ".user_plan", "UserPlan", "Select Plan");
                let a = document.createElement("select");
                a.id = "FilterTransaction", a.className = "form-select text-capitalize", a.innerHTML = '<option value="">Select Status</option>', document.querySelector(".user_status").appendChild(a), a.addEventListener("change", () => {
                    var e = a.value ? `^${a.value}$` : "";
                    r.column(6).search(e, !0, !1).draw()
                });
                e = r.column(6);
                Array.from(new Set(e.data().toArray())).sort().forEach(e => {
                    var t = document.createElement("option");
                    t.value = n[e]?.title || e, t.textContent = n[e]?.title || e, t.className = "text-capitalize", a.appendChild(t)
                })
            }
        });

        function o(e) {
            let t = document.querySelector(".dtr-expanded");
            (t = e ? e.target.parentElement.closest("tr") : t) && a.row(t).remove().draw()
        }

        function l() {
            var e = document.querySelector(".datatables-users");
            let t = document.querySelector(".dtr-bs-modal");
            e && e.classList.contains("collapsed") ? t && t.addEventListener("click", function (e) {
                e.target.parentElement.classList.contains("delete-record") && (o(), e = t.querySelector(".btn-close")) && e.click()
            }) : (e = e?.querySelector("tbody")) && e.addEventListener("click", function (e) {
                e.target.parentElement.classList.contains("delete-record") && o(e)
            })
        }

        l(), document.addEventListener("show.bs.modal", function (e) {
            e.target.classList.contains("dtr-bs-modal") && l()
        }), document.addEventListener("hide.bs.modal", function (e) {
            e.target.classList.contains("dtr-bs-modal") && l()
        }), $(".dt-buttons > .btn-group > button").removeClass("btn-secondary")
    }
    setTimeout(() => {
        [{selector: ".dt-buttons .btn", classToRemove: "btn-secondary"}, {
            selector: ".dt-search .form-control",
            classToRemove: "form-control-sm"
        }, {
            selector: ".dt-length .form-select",
            classToRemove: "form-select-sm",
            classToAdd: "ms-0"
        }, {selector: ".dt-length", classToAdd: "mb-md-6 mb-0"}, {
            selector: ".dt-search",
            classToAdd: "mb-md-6 mb-2"
        }, {
            selector: ".dt-layout-end",
            classToRemove: "justify-content-between",
            classToAdd: "d-flex gap-md-4 justify-content-md-between justify-content-center gap-4 flex-wrap mt-0"
        }, {selector: ".dt-layout-start", classToAdd: "mt-0"}, {
            selector: ".dt-buttons",
            classToAdd: "d-flex gap-4 mb-md-0 mb-6"
        }, {selector: ".dt-layout-table", classToRemove: "row mt-2"}, {
            selector: ".dt-layout-full",
            classToRemove: "col-md col-12",
            classToAdd: "table-responsive"
        }].forEach(({selector: e, classToRemove: a, classToAdd: s}) => {
            document.querySelectorAll(e).forEach(t => {
                a && a.split(" ").forEach(e => t.classList.remove(e)), s && s.split(" ").forEach(e => t.classList.add(e))
            })
        })
    }, 100);
    var i = document.querySelectorAll(".phone-mask"), c = document.getElementById("addNewUserForm");
    i && i.forEach(function (t) {
        t.addEventListener("input", e => {
            e = e.target.value.replace(/\D/g, "");
            t.value = formatGeneral(e, {blocks: [3, 3, 4], delimiters: [" ", " "]})
        }), registerCursorTracker({input: t, delimiter: " "})
    }), FormValidation.formValidation(c, {
        fields: {
            userFullname: {validators: {notEmpty: {message: "Please enter fullname "}}},
            userEmail: {
                validators: {
                    notEmpty: {message: "Please enter your email"},
                    emailAddress: {message: "The value is not a valid email address"}
                }
            }
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger,
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                eleValidClass: "", rowSelector: function (e, t) {
                    return ".form-control-validation"
                }
            }),
            submitButton: new FormValidation.plugins.SubmitButton,
            autoFocus: new FormValidation.plugins.AutoFocus
        }
    })
});
