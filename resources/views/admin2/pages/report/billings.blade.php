@section('customCSS')
    <link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/collects/filter_multi_select.css') }}" />
    <style>
        .notification {
            color: red;
            font-size: 85%;
        }

        .filter>div {
            display: flex;
            justify-content: center;
        }

        .filter input {
            width: 6em;
        }

        .u-none {
            display: none;
        }
    </style>
@endsection
@extends('admin2.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <form class="container" method="GET" id="billing_filter_form">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-10" id="notifications">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="client_id">Clients</label>
                                                <select multiple name="client_id" id="client_id"
                                                    class="filter-multi-select">
                                                    @foreach ($clients as $client)
                                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label class="form-label" for="year">Year</label>

                                                <select multiple name="year" id="year" class="filter-multi-select">
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label class="form-label" for="payment_status">Payment status</label>

                                                <select multiple name="payment_status" id="payment_status"
                                                    class="filter-multi-select">
                                                    <option value="Paid">Paid</option>
                                                    <option value="Matured">Matured</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label" for="due">Total Due</label>
                                                <div class="d-flex">
                                                    <select name="due" id="due" class="form-control flex-fill">
                                                        <option value="=">=</option>
                                                        <option value="<">&lt;</option>
                                                        <option value=">">&gt;</option>
                                                        <option value="<=">≤</option>
                                                        <option value=">=">≥</option>
                                                    </select>
                                                    <input type="number" class="form-control flex-md-shrink-1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    {{--                                    <thead> --}}
                                    {{--                                    <th class="filter" id="due-filter"> --}}
                                    {{--                                        Regular Price --}}
                                    {{--                                        <div> --}}
                                    {{--                                            <select> --}}
                                    {{--                                                <option value="=">=</option> --}}
                                    {{--                                                <option value="<">&lt;</option> --}}
                                    {{--                                                <option value=">">&gt;</option> --}}
                                    {{--                                                <option value="<=">≤</option> --}}
                                    {{--                                                <option value=">=">≥</option> --}}
                                    {{--                                            </select> --}}
                                    {{--                                            <input type="number"> --}}
                                    {{--                                        </div> --}}
                                    {{--                                    </th> --}}
                                    {{--                                    </thead> --}}
                                    {{--                                    <tbody> --}}
                                    {{--                                    <tr> --}}
                                    {{--                                        <td>4</td> --}}
                                    {{--                                    </tr> --}}
                                    {{--                                    </tbody> --}}


                                    <thead>
                                        <tr>
                                            <th>Client ID</th>
                                            <th>Year</th>
                                            <th>January</th>
                                            <th>February</th>
                                            <th>March</th>
                                            <th>April</th>
                                            <th>May</th>
                                            <th>June</th>
                                            <th>July</th>
                                            <th>August</th>
                                            <th>September</th>
                                            <th>October</th>
                                            <th>November</th>
                                            <th>December</th>
                                            <th>Total Due</th>
                                            <th>Total Net</th>
                                            <th>Total Received</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($results as $row)
                                            <tr>
                                                <td>{{ $row->client_id }}</td>
                                                <td>{{ $row->year }}</td>
                                                <td>{{ $row->january }}</td>
                                                <td>{{ $row->february }}</td>
                                                <td>{{ $row->march }}</td>
                                                <td>{{ $row->april }}</td>
                                                <td>{{ $row->may }}</td>
                                                <td>{{ $row->june }}</td>
                                                <td>{{ $row->july }}</td>
                                                <td>{{ $row->august }}</td>
                                                <td>{{ $row->september }}</td>
                                                <td>{{ $row->october }}</td>
                                                <td>{{ $row->november }}</td>
                                                <td>{{ $row->december }}</td>
                                                <td>{{ $row->total_due }}</td>
                                                <td>{{ $row->total_net }}</td>
                                                <td>{{ $row->received_amount }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- /.card-body -->
                        </div>

                        <table>
                            <thead>
                                <th class="filter" id="due-filter">
                                    Regular Price
                                    <div>
                                        <select>
                                            <option value="=">=</option>
                                            <option value="<">&lt;</option>
                                            <option value=">">&gt;</option>
                                            <option value="<=">≤</option>
                                            <option value=">=">≥</option>
                                        </select>
                                        <input type="number">
                                    </div>
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>4</td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


@section('customJs')
    <script src="{{ asset('assets/admin2/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/filter-multi-select-bundle.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
    {{--    <script type="text/javascript"> --}}
    {{--        $(function () { --}}

    {{--            $(function () { --}}
    {{--                $("#example1").DataTable({ --}}
    {{--                    "responsive": true, "lengthChange": false, "autoWidth": false, --}}
    {{--                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"] --}}
    {{--                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)'); --}}

    {{--            }); --}}

    {{--        }); --}}
    {{--    </script> --}}

    <script>
        const table = document.getElementById("myTable");

        const tr = table.getElementsByTagName("tr");

        function SearchData() {

            var name = document.getElementById("idName").value.toUpperCase();
            var country = document.getElementById("idCountry").value.toUpperCase();
            var age = document.getElementById("idAge").value.toUpperCase();
            var salary = document.getElementById("idSalary").value.toUpperCase();

            for (i = 1; i < tr.length; i++) {

                var rowName = tr[i].getElementsByTagName("td")[0].textContent.toUpperCase();
                var rowCountry = tr[i].getElementsByTagName("td")[1].textContent.toUpperCase();
                var rowAge = tr[i].getElementsByTagName("td")[2].textContent.toUpperCase();
                var rowSalary = tr[i].getElementsByTagName("td")[3].textContent.toUpperCase();

                var isDiplay = true;

                if (name != 'ALL' && rowName != name) {
                    isDiplay = false;
                }
                if (country != 'ALL' && rowCountry != country) {
                    isDiplay = false;
                }
                if (age != 'ALL' && rowAge != age) {
                    isDiplay = false;
                }
                if (salary != 'ALL' && rowSalary != salary) {
                    isDiplay = false;
                }

                if (isDiplay) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }


            }
        }
    </script>
    <script type="text/javascript">
        (function($) {
            "use strict";

            function _interopDefaultLegacy(e) {
                return e && typeof e === "object" && "default" in e ? e : {
                    "default": e
                }
            }
            var $__default = _interopDefaultLegacy($);
            var __extends = undefined && undefined.__extends || function() {
                var extendStatics = function(d, b) {
                    extendStatics = Object.setPrototypeOf || {
                        __proto__: []
                    }
                    instanceof Array && function(d, b) {
                        d.__proto__ = b
                    } || function(d, b) {
                        for (var p in b)
                            if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]
                    };
                    return extendStatics(d, b)
                };
                return function(d, b) {
                    extendStatics(d, b);

                    function __() {
                        this.constructor = d
                    }
                    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __)
                }
            }();
            var NULL_OPTION = new(function() {
                function class_1() {}
                class_1.prototype.initialize = function() {};
                class_1.prototype.select = function() {};
                class_1.prototype.deselect = function() {};
                class_1.prototype.enable = function() {};
                class_1.prototype.disable = function() {};
                class_1.prototype.isSelected = function() {
                    return false
                };
                class_1.prototype.isDisabled = function() {
                    return true
                };
                class_1.prototype.getListItem = function() {
                    return document.createElement("div")
                };
                class_1.prototype.getSelectedItemBadge = function() {
                    return document.createElement("div")
                };
                class_1.prototype.getLabel = function() {
                    return "NULL_OPTION"
                };
                class_1.prototype.getValue = function() {
                    return "NULL_OPTION"
                };
                class_1.prototype.show = function() {};
                class_1.prototype.hide = function() {};
                class_1.prototype.isHidden = function() {
                    return true
                };
                class_1.prototype.focus = function() {};
                class_1.prototype.activate = function() {};
                class_1.prototype.deactivate = function() {};
                return class_1
            }());
            var FilterMultiSelect = function() {
                function FilterMultiSelect(selectTarget, args) {
                    var _this = this;
                    this.documentKeydownListener = function(e) {
                        switch (e.key) {
                            case "Tab":
                                e.stopPropagation();
                                _this.closeDropdown();
                                break;
                            case "ArrowUp":
                                e.stopPropagation();
                                e.preventDefault();
                                _this.decrementItemFocus();
                                _this.focusItem();
                                break;
                            case "ArrowDown":
                                e.stopPropagation();
                                e.preventDefault();
                                _this.incrementItemFocus();
                                _this.focusItem();
                                break;
                            case "Enter":
                            case "Spacebar":
                            case " ":
                                break;
                            default:
                                _this.refocusFilter();
                                break
                        }
                    };
                    this.documentClickListener = function(e) {
                        if (_this.div !== e.target && !_this.div.contains(e.target)) {
                            _this.closeDropdown()
                        }
                    };
                    this.fmsFocusListener = function(e) {
                        e.stopPropagation();
                        e.preventDefault();
                        _this.viewBar.dispatchEvent(new MouseEvent("click"))
                    };
                    this.fmsMousedownListener = function(e) {
                        e.stopPropagation();
                        e.preventDefault()
                    };
                    var t = selectTarget.get(0);
                    if (!(t instanceof HTMLSelectElement)) {
                        throw new Error("JQuery target must be a select element.")
                    }
                    var select = t;
                    var name = select.name;
                    if (!name) {
                        throw new Error("Select element must have a name attribute.")
                    }
                    this.name = name;
                    var array = selectTarget.find("option").toArray();
                    this.options = FilterMultiSelect.createOptions(this, name, array, args.items);
                    this.numSelectedItems = 0;
                    this.maxNumSelectedItems = !select.multiple ? 1 : args.selectionLimit > 0 ? args
                        .selectionLimit : parseInt(select.getAttribute("multiple")) > 0 ? parseInt(select
                            .getAttribute("multiple")) : 0;
                    var numOptions = this.options.length;
                    var restrictSelection = this.maxNumSelectedItems > 0 && this.maxNumSelectedItems < numOptions;
                    this.maxNumSelectedItems = restrictSelection ? this.maxNumSelectedItems : numOptions + 1;
                    this.selectAllOption = restrictSelection ? new FilterMultiSelect.RestrictedSelectAllOption(this,
                        name, args.selectAllText) : new FilterMultiSelect.UnrestrictedSelectAllOption(this,
                        name, args.selectAllText);
                    this.filterInput = document.createElement("input");
                    this.filterInput.type = "text";
                    this.filterInput.placeholder = args.filterText;
                    this.clearButton = document.createElement("button");
                    this.clearButton.type = "button";
                    this.clearButton.innerHTML = "&times;";
                    this.filter = document.createElement("div");
                    this.filter.append(this.filterInput, this.clearButton);
                    this.items = document.createElement("div");
                    this.items.append(this.selectAllOption.getListItem());
                    this.options.forEach(function(o) {
                        return _this.items.append(o.getListItem())
                    });
                    this.dropDown = document.createElement("div");
                    this.dropDown.append(this.filter, this.items);
                    this.placeholder = document.createElement("span");
                    this.placeholder.textContent = args.placeholderText;
                    this.selectedItems = document.createElement("span");
                    this.label = document.createElement("span");
                    this.label.textContent = args.labelText;
                    var customLabel = args.labelText.length != 0;
                    if (!customLabel) {
                        this.label.hidden = true
                    }
                    this.selectionCounter = document.createElement("span");
                    this.selectionCounter.hidden = !restrictSelection;
                    this.viewBar = document.createElement("div");
                    this.viewBar.append(this.label, this.selectionCounter, this.placeholder, this.selectedItems);
                    this.div = document.createElement("div");
                    this.div.id = select.id;
                    this.div.append(this.viewBar, this.dropDown);
                    this.caseSensitive = args.caseSensitive;
                    this.disabled = select.disabled;
                    this.allowEnablingAndDisabling = args.allowEnablingAndDisabling;
                    this.filterText = "";
                    this.showing = new Array;
                    this.itemFocus = -2;
                    this.initialize()
                }
                FilterMultiSelect.createOptions = function(fms, name, htmlOptions, jsOptions) {
                    var htmloptions = htmlOptions.map(function(o, i) {
                        FilterMultiSelect.checkValue(o.value, o.label);
                        return new FilterMultiSelect.SingleOption(fms, i, name, o.label, o.value, o
                            .defaultSelected, o.disabled)
                    });
                    var j = htmlOptions.length;
                    var jsoptions = jsOptions.map(function(o, i) {
                        var label = o[0];
                        var value = o[1];
                        var selected = o[2];
                        var disabled = o[3];
                        FilterMultiSelect.checkValue(value, label);
                        return new FilterMultiSelect.SingleOption(fms, j + i, name, label, value,
                            selected, disabled)
                    });
                    var opts = htmloptions.concat(jsoptions);
                    var counts = {};
                    opts.forEach(function(o) {
                        var v = o.getValue();
                        if (counts[v] === undefined) {
                            counts[v] = 1
                        } else {
                            throw new Error("Duplicate value: " + o.getValue() + " (" + o.getLabel() +
                                ")")
                        }
                    });
                    return opts
                };
                FilterMultiSelect.checkValue = function(value, label) {
                    if (value === "") {
                        throw new Error("Option " + label + " does not have an associated value.")
                    }
                };
                FilterMultiSelect.createEvent = function(e, n, v, l) {
                    var event = new CustomEvent(e, {
                        detail: {
                            name: n,
                            value: v,
                            label: l
                        },
                        bubbles: true,
                        cancelable: true,
                        composed: false
                    });
                    return event
                };
                FilterMultiSelect.prototype.initialize = function() {
                    this.options.forEach(function(o) {
                        return o.initialize()
                    });
                    this.selectAllOption.initialize();
                    this.filterInput.className = "form-control";
                    this.clearButton.tabIndex = -1;
                    this.filter.className = "filter dropdown-item";
                    this.items.className = "items dropdown-item";
                    this.dropDown.className = "dropdown-menu";
                    this.placeholder.className = "placeholder";
                    this.selectedItems.className = "selected-items";
                    this.viewBar.className = "viewbar form-control dropdown-toggle";
                    this.label.className = "col-form-label mr-2 text-dark";
                    this.selectionCounter.className = "mr-2";
                    this.div.className = "filter-multi-select dropdown";
                    if (this.isDisabled()) {
                        this.disableNoPermissionCheck()
                    }
                    this.attachDropdownListeners();
                    this.attachViewbarListeners();
                    this.closeDropdown()
                };
                FilterMultiSelect.prototype.log = function(m, e) {};
                FilterMultiSelect.prototype.attachDropdownListeners = function() {
                    var _this = this;
                    this.filterInput.addEventListener("keyup", function(e) {
                        e.stopImmediatePropagation();
                        _this.updateDropdownList();
                        var numShown = _this.showing.length;
                        switch (e.key) {
                            case "Enter":
                                if (numShown === 1) {
                                    var o = _this.options[_this.showing[0]];
                                    if (!o.isDisabled()) {
                                        if (o.isSelected()) {
                                            o.deselect()
                                        } else {
                                            o.select()
                                        }
                                        _this.clearFilterAndRefocus()
                                    }
                                }
                                break;
                            case "Escape":
                                if (_this.filterText.length > 0) {
                                    _this.clearFilterAndRefocus()
                                } else {
                                    _this.closeDropdown()
                                }
                                break
                        }
                    }, true);
                    this.clearButton.addEventListener("click", function(e) {
                        e.stopImmediatePropagation();
                        var text = _this.filterInput.value;
                        if (text.length > 0) {
                            _this.clearFilterAndRefocus()
                        } else {
                            _this.closeDropdown()
                        }
                    }, true)
                };
                FilterMultiSelect.prototype.updateDropdownList = function() {
                    var text = this.filterInput.value;
                    if (text.length > 0) {
                        this.selectAllOption.hide()
                    } else {
                        this.selectAllOption.show()
                    }
                    var showing = new Array;
                    if (this.caseSensitive) {
                        this.options.forEach(function(o, i) {
                            if (o.getLabel().indexOf(text) !== -1) {
                                o.show();
                                showing.push(i)
                            } else {
                                o.hide()
                            }
                        })
                    } else {
                        this.options.forEach(function(o, i) {
                            if (o.getLabel().toLowerCase().indexOf(text.toLowerCase()) !== -1) {
                                o.show();
                                showing.push(i)
                            } else {
                                o.hide()
                            }
                        })
                    }
                    this.filterText = text;
                    this.showing = showing
                };
                FilterMultiSelect.prototype.clearFilterAndRefocus = function() {
                    this.filterInput.value = "";
                    this.updateDropdownList();
                    this.refocusFilter()
                };
                FilterMultiSelect.prototype.refocusFilter = function() {
                    this.filterInput.focus();
                    this.itemFocus = -2
                };
                FilterMultiSelect.prototype.attachViewbarListeners = function() {
                    var _this = this;
                    this.viewBar.addEventListener("click", function(e) {
                        if (_this.isClosed()) {
                            _this.openDropdown()
                        } else {
                            _this.closeDropdown()
                        }
                    })
                };
                FilterMultiSelect.prototype.isClosed = function() {
                    return !this.dropDown.classList.contains("show")
                };
                FilterMultiSelect.prototype.setTabIndex = function() {
                    if (this.isDisabled()) {
                        this.div.tabIndex = -1
                    } else {
                        if (this.isClosed()) {
                            this.div.tabIndex = 0
                        } else {
                            this.div.tabIndex = -1
                        }
                    }
                };
                FilterMultiSelect.prototype.closeDropdown = function() {
                    var _this = this;
                    document.removeEventListener("keydown", this.documentKeydownListener, true);
                    document.removeEventListener("click", this.documentClickListener, true);
                    this.dropDown.classList.remove("show");
                    setTimeout(function() {
                        _this.setTabIndex()
                    }, 100);
                    this.div.addEventListener("mousedown", this.fmsMousedownListener, true);
                    this.div.addEventListener("focus", this.fmsFocusListener)
                };
                FilterMultiSelect.prototype.incrementItemFocus = function() {
                    if (this.itemFocus >= this.options.length - 1) return;
                    var i = this.itemFocus;
                    do {
                        i++
                    } while (i == -1 && (this.selectAllOption.isDisabled() || this.selectAllOption
                            .isHidden()) || i >= 0 && i < this.options.length && (this.options[i]
                            .isDisabled() || this
                            .options[i].isHidden()));
                    this.itemFocus = i > this.options.length - 1 ? this.itemFocus : i
                };
                FilterMultiSelect.prototype.decrementItemFocus = function() {
                    if (this.itemFocus <= -2) return;
                    var i = this.itemFocus;
                    do {
                        i--
                    } while (i == -1 && (this.selectAllOption.isDisabled() || this.selectAllOption
                            .isHidden()) || i >= 0 && (this.options[i].isDisabled() || this.options[i]
                            .isHidden()) &&
                        i > -2);
                    this.itemFocus = i
                };
                FilterMultiSelect.prototype.focusItem = function() {
                    if (this.itemFocus === -2) {
                        this.refocusFilter()
                    } else if (this.itemFocus === -1) {
                        this.selectAllOption.focus()
                    } else {
                        this.options[this.itemFocus].focus()
                    }
                };
                FilterMultiSelect.prototype.openDropdown = function() {
                    if (this.disabled) return;
                    this.div.removeEventListener("mousedown", this.fmsMousedownListener, true);
                    this.div.removeEventListener("focus", this.fmsFocusListener);
                    this.dropDown.classList.add("show");
                    this.setTabIndex();
                    this.clearFilterAndRefocus();
                    document.addEventListener("keydown", this.documentKeydownListener, true);
                    document.addEventListener("click", this.documentClickListener, true)
                };
                FilterMultiSelect.prototype.queueOption = function(option) {
                    if (this.options.indexOf(option) == -1) return;
                    this.numSelectedItems++;
                    $__default["default"](this.selectedItems).append(option.getSelectedItemBadge())
                };
                FilterMultiSelect.prototype.unqueueOption = function(option) {
                    if (this.options.indexOf(option) == -1) return;
                    this.numSelectedItems--;
                    $__default["default"](this.selectedItems).children('[data-id="' + option
                        .getSelectedItemBadge().getAttribute("data-id") + '"]').remove()
                };
                FilterMultiSelect.prototype.update = function() {
                    if (this.areAllSelected()) {
                        this.selectAllOption.markSelectAll();
                        this.placeholder.hidden = true
                    } else if (this.areSomeSelected()) {
                        if (this.areOnlyDeselectedAlsoDisabled()) {
                            this.selectAllOption.markSelectAllNotDisabled();
                            this.placeholder.hidden = true
                        } else {
                            this.selectAllOption.markSelectPartial();
                            this.placeholder.hidden = true
                        }
                    } else {
                        this.selectAllOption.markDeselect();
                        this.placeholder.hidden = false
                    }
                    if (this.areAllDisabled()) {
                        this.selectAllOption.disable()
                    } else {
                        this.selectAllOption.enable()
                    }
                    if (!this.canSelect()) {
                        this.options.filter(function(o) {
                            return !o.isSelected()
                        }).forEach(function(o) {
                            return o.deactivate()
                        })
                    } else {
                        this.options.filter(function(o) {
                            return !o.isSelected()
                        }).forEach(function(o) {
                            return o.activate()
                        })
                    }
                    this.updateSelectionCounter()
                };
                FilterMultiSelect.prototype.areAllSelected = function() {
                    return this.options.map(function(o) {
                        return o.isSelected()
                    }).reduce(function(acc, cur) {
                        return acc && cur
                    }, true)
                };
                FilterMultiSelect.prototype.areSomeSelected = function() {
                    return this.options.map(function(o) {
                        return o.isSelected()
                    }).reduce(function(acc, cur) {
                        return acc || cur
                    }, false)
                };
                FilterMultiSelect.prototype.areOnlyDeselectedAlsoDisabled = function() {
                    return this.options.filter(function(o) {
                        return !o.isSelected()
                    }).map(function(o) {
                        return o.isDisabled()
                    }).reduce(function(acc, cur) {
                        return acc && cur
                    }, true)
                };
                FilterMultiSelect.prototype.areAllDisabled = function() {
                    return this.options.map(function(o) {
                        return o.isDisabled()
                    }).reduce(function(acc, cur) {
                        return acc && cur
                    }, true)
                };
                FilterMultiSelect.prototype.isEnablingAndDisablingPermitted = function() {
                    return this.allowEnablingAndDisabling
                };
                FilterMultiSelect.prototype.getRootElement = function() {
                    return this.div
                };
                FilterMultiSelect.prototype.hasOption = function(value) {
                    return this.getOption(value) !== NULL_OPTION
                };
                FilterMultiSelect.prototype.getOption = function(value) {
                    for (var _i = 0, _a = this.options; _i < _a.length; _i++) {
                        var o = _a[_i];
                        if (o.getValue() == value) {
                            return o
                        }
                    }
                    return NULL_OPTION
                };
                FilterMultiSelect.prototype.selectOption = function(value) {
                    if (this.isDisabled()) return;
                    this.getOption(value).select()
                };
                FilterMultiSelect.prototype.deselectOption = function(value) {
                    if (this.isDisabled()) return;
                    this.getOption(value).deselect()
                };
                FilterMultiSelect.prototype.isOptionSelected = function(value) {
                    return this.getOption(value).isSelected()
                };
                FilterMultiSelect.prototype.enableOption = function(value) {
                    if (!this.isEnablingAndDisablingPermitted()) return;
                    this.getOption(value).enable()
                };
                FilterMultiSelect.prototype.disableOption = function(value) {
                    if (!this.isEnablingAndDisablingPermitted()) return;
                    this.getOption(value).disable()
                };
                FilterMultiSelect.prototype.isOptionDisabled = function(value) {
                    return this.getOption(value).isDisabled()
                };
                FilterMultiSelect.prototype.disable = function() {
                    if (!this.isEnablingAndDisablingPermitted()) return;
                    this.disableNoPermissionCheck()
                };
                FilterMultiSelect.prototype.disableNoPermissionCheck = function() {
                    var _this = this;
                    this.options.forEach(function(o) {
                        return _this.setBadgeDisabled(o)
                    });
                    this.disabled = true;
                    this.div.classList.add("disabled");
                    this.viewBar.classList.remove("dropdown-toggle");
                    this.closeDropdown()
                };
                FilterMultiSelect.prototype.setBadgeDisabled = function(o) {
                    o.getSelectedItemBadge().classList.add("disabled")
                };
                FilterMultiSelect.prototype.enable = function() {
                    var _this = this;
                    if (!this.isEnablingAndDisablingPermitted()) return;
                    this.options.forEach(function(o) {
                        if (!o.isDisabled()) {
                            _this.setBadgeEnabled(o)
                        }
                    });
                    this.disabled = false;
                    this.div.classList.remove("disabled");
                    this.setTabIndex();
                    this.viewBar.classList.add("dropdown-toggle")
                };
                FilterMultiSelect.prototype.setBadgeEnabled = function(o) {
                    o.getSelectedItemBadge().classList.remove("disabled")
                };
                FilterMultiSelect.prototype.isDisabled = function() {
                    return this.disabled
                };
                FilterMultiSelect.prototype.selectAll = function() {
                    if (this.isDisabled()) return;
                    this.selectAllOption.select()
                };
                FilterMultiSelect.prototype.deselectAll = function() {
                    if (this.isDisabled()) return;
                    this.selectAllOption.deselect()
                };
                FilterMultiSelect.prototype.getSelectedOptions = function(includeDisabled) {
                    if (includeDisabled === void 0) {
                        includeDisabled = true
                    }
                    var a = this.options;
                    if (!includeDisabled) {
                        if (this.isDisabled()) {
                            return new Array
                        }
                        a = a.filter(function(o) {
                            return !o.isDisabled()
                        })
                    }
                    a = a.filter(function(o) {
                        return o.isSelected()
                    });
                    return a
                };
                FilterMultiSelect.prototype.getSelectedOptionsAsJson = function(includeDisabled) {
                    if (includeDisabled === void 0) {
                        includeDisabled = true
                    }
                    var data = {};
                    var a = this.getSelectedOptions(includeDisabled).map(function(o) {
                        return o.getValue()
                    });
                    data[this.getName()] = a;
                    var c = JSON.stringify(data, null, "  ");
                    return c
                };
                FilterMultiSelect.prototype.getName = function() {
                    return this.name
                };
                FilterMultiSelect.prototype.dispatchSelectedEvent = function(option) {
                    this.dispatchEvent(FilterMultiSelect.EventType.SELECTED, option.getValue(), option
                        .getLabel())
                };
                FilterMultiSelect.prototype.dispatchDeselectedEvent = function(option) {
                    this.dispatchEvent(FilterMultiSelect.EventType.DESELECTED, option.getValue(), option
                        .getLabel())
                };
                FilterMultiSelect.prototype.dispatchEvent = function(eventType, value, label) {
                    var event = FilterMultiSelect.createEvent(eventType, this.getName(), value, label);
                    this.viewBar.dispatchEvent(event)
                };
                FilterMultiSelect.prototype.canSelect = function() {
                    return this.numSelectedItems < this.maxNumSelectedItems
                };
                FilterMultiSelect.prototype.updateSelectionCounter = function() {
                    this.selectionCounter.textContent = this.numSelectedItems + "/" + this.maxNumSelectedItems
                };
                FilterMultiSelect.SingleOption = function() {
                    function class_2(fms, row, name, label, value, checked, disabled) {
                        this.fms = fms;
                        this.div = document.createElement("div");
                        this.checkbox = document.createElement("input");
                        this.checkbox.type = "checkbox";
                        var id = name + "-" + row.toString();
                        var nchbx = id + "-chbx";
                        this.checkbox.id = nchbx;
                        this.checkbox.name = name;
                        this.checkbox.value = value;
                        this.initiallyChecked = checked;
                        this.checkbox.checked = false;
                        this.checkbox.disabled = disabled;
                        this.labelFor = document.createElement("label");
                        this.labelFor.htmlFor = nchbx;
                        this.labelFor.textContent = label;
                        this.div.append(this.checkbox, this.labelFor);
                        this.closeButton = document.createElement("button");
                        this.closeButton.type = "button";
                        this.closeButton.innerHTML = "&times;";
                        this.selectedItemBadge = document.createElement("span");
                        this.selectedItemBadge.setAttribute("data-id", id);
                        this.selectedItemBadge.textContent = label;
                        this.selectedItemBadge.append(this.closeButton);
                        this.disabled = disabled;
                        this.active = true
                    }
                    class_2.prototype.log = function(m, e) {};
                    class_2.prototype.initialize = function() {
                        var _this = this;
                        this.div.className = "dropdown-item custom-control";
                        this.checkbox.className = "custom-control-input custom-checkbox";
                        this.labelFor.className = "custom-control-label";
                        this.selectedItemBadge.className = "item";
                        if (this.initiallyChecked) {
                            this.selectNoDisabledCheck()
                        }
                        if (this.disabled) {
                            this.setDisabledViewState()
                        }
                        this.fms.update();
                        this.checkbox.addEventListener("change", function(e) {
                            e.stopPropagation();
                            if (_this.isDisabled() || _this.fms.isDisabled()) {
                                e.preventDefault();
                                return
                            }
                            if (_this.isSelected()) {
                                _this.select()
                            } else {
                                _this.deselect()
                            }
                            var numShown = _this.fms.showing.length;
                            if (numShown === 1) {
                                _this.fms.clearFilterAndRefocus()
                            }
                        }, true);
                        this.checkbox.addEventListener("keyup", function(e) {
                            switch (e.key) {
                                case "Enter":
                                    e.stopPropagation();
                                    _this.checkbox.dispatchEvent(new MouseEvent("click"));
                                    break
                            }
                        }, true);
                        this.closeButton.addEventListener("click", function(e) {
                            e.stopPropagation();
                            if (_this.isDisabled() || _this.fms.isDisabled()) return;
                            _this.deselect();
                            if (!_this.fms.isClosed()) {
                                _this.fms.refocusFilter()
                            }
                        }, true);
                        this.checkbox.tabIndex = -1;
                        this.closeButton.tabIndex = -1
                    };
                    class_2.prototype.select = function() {
                        if (this.isDisabled()) return;
                        this.selectNoDisabledCheck();
                        this.fms.update()
                    };
                    class_2.prototype.selectNoDisabledCheck = function() {
                        if (!this.fms.canSelect() || !this.isActive()) return;
                        this.checkbox.checked = true;
                        this.fms.queueOption(this);
                        this.fms.dispatchSelectedEvent(this)
                    };
                    class_2.prototype.deselect = function() {
                        if (this.isDisabled()) return;
                        this.checkbox.checked = false;
                        this.fms.unqueueOption(this);
                        this.fms.dispatchDeselectedEvent(this);
                        this.fms.update()
                    };
                    class_2.prototype.enable = function() {
                        this.disabled = false;
                        this.setEnabledViewState();
                        this.fms.update()
                    };
                    class_2.prototype.setEnabledViewState = function() {
                        this.checkbox.disabled = false;
                        this.selectedItemBadge.classList.remove("disabled")
                    };
                    class_2.prototype.disable = function() {
                        this.disabled = true;
                        this.setDisabledViewState();
                        this.fms.update()
                    };
                    class_2.prototype.setDisabledViewState = function() {
                        this.checkbox.disabled = true;
                        this.selectedItemBadge.classList.add("disabled")
                    };
                    class_2.prototype.isSelected = function() {
                        return this.checkbox.checked
                    };
                    class_2.prototype.isDisabled = function() {
                        return this.checkbox.disabled
                    };
                    class_2.prototype.getListItem = function() {
                        return this.div
                    };
                    class_2.prototype.getSelectedItemBadge = function() {
                        return this.selectedItemBadge
                    };
                    class_2.prototype.getLabel = function() {
                        return this.labelFor.textContent
                    };
                    class_2.prototype.getValue = function() {
                        return this.checkbox.value
                    };
                    class_2.prototype.show = function() {
                        this.div.hidden = false
                    };
                    class_2.prototype.hide = function() {
                        this.div.hidden = true
                    };
                    class_2.prototype.isHidden = function() {
                        return this.div.hidden
                    };
                    class_2.prototype.focus = function() {
                        this.labelFor.focus()
                    };
                    class_2.prototype.isActive = function() {
                        return this.active
                    };
                    class_2.prototype.activate = function() {
                        this.active = true;
                        if (!this.disabled) {
                            this.setEnabledViewState()
                        }
                    };
                    class_2.prototype.deactivate = function() {
                        this.active = false;
                        this.setDisabledViewState()
                    };
                    return class_2
                }();
                FilterMultiSelect.UnrestrictedSelectAllOption = function(_super) {
                    __extends(class_3, _super);

                    function class_3(fms, name, label) {
                        var _this = _super.call(this, fms, -1, name, label, "", false, false) || this;
                        _this.checkbox.indeterminate = false;
                        return _this
                    }
                    class_3.prototype.markSelectAll = function() {
                        this.checkbox.checked = true;
                        this.checkbox.indeterminate = false
                    };
                    class_3.prototype.markSelectPartial = function() {
                        this.checkbox.checked = false;
                        this.checkbox.indeterminate = true
                    };
                    class_3.prototype.markSelectAllNotDisabled = function() {
                        this.checkbox.checked = true;
                        this.checkbox.indeterminate = true
                    };
                    class_3.prototype.markDeselect = function() {
                        this.checkbox.checked = false;
                        this.checkbox.indeterminate = false
                    };
                    class_3.prototype.select = function() {
                        if (this.isDisabled()) return;
                        this.fms.options.filter(function(o) {
                            return !o.isSelected()
                        }).forEach(function(o) {
                            return o.select()
                        });
                        this.fms.update()
                    };
                    class_3.prototype.deselect = function() {
                        if (this.isDisabled()) return;
                        this.fms.options.filter(function(o) {
                            return o.isSelected()
                        }).forEach(function(o) {
                            return o.deselect()
                        });
                        this.fms.update()
                    };
                    class_3.prototype.enable = function() {
                        this.disabled = false;
                        this.checkbox.disabled = false
                    };
                    class_3.prototype.disable = function() {
                        this.disabled = true;
                        this.checkbox.disabled = true
                    };
                    return class_3
                }(FilterMultiSelect.SingleOption);
                FilterMultiSelect.RestrictedSelectAllOption = function() {
                    function class_4(fms, name, label) {
                        this.usao = new FilterMultiSelect.UnrestrictedSelectAllOption(fms, name, label)
                    }
                    class_4.prototype.initialize = function() {
                        this.usao.initialize()
                    };
                    class_4.prototype.select = function() {};
                    class_4.prototype.deselect = function() {
                        this.usao.deselect()
                    };
                    class_4.prototype.enable = function() {};
                    class_4.prototype.disable = function() {};
                    class_4.prototype.isSelected = function() {
                        return false
                    };
                    class_4.prototype.isDisabled = function() {
                        return true
                    };
                    class_4.prototype.getListItem = function() {
                        return document.createElement("div")
                    };
                    class_4.prototype.getSelectedItemBadge = function() {
                        return document.createElement("div")
                    };
                    class_4.prototype.getLabel = function() {
                        return "RESTRICTED_SELECT_ALL_OPTION"
                    };
                    class_4.prototype.getValue = function() {
                        return "RESTRICTED_SELECT_ALL_OPTION"
                    };
                    class_4.prototype.show = function() {};
                    class_4.prototype.hide = function() {};
                    class_4.prototype.isHidden = function() {
                        return true
                    };
                    class_4.prototype.focus = function() {};
                    class_4.prototype.markSelectAll = function() {};
                    class_4.prototype.markSelectPartial = function() {};
                    class_4.prototype.markSelectAllNotDisabled = function() {};
                    class_4.prototype.markDeselect = function() {};
                    class_4.prototype.activate = function() {};
                    class_4.prototype.deactivate = function() {};
                    return class_4
                }();
                FilterMultiSelect.EventType = {
                    SELECTED: "optionselected",
                    DESELECTED: "optiondeselected"
                };
                return FilterMultiSelect
            }();
            $__default["default"].fn.filterMultiSelect = function(args) {
                var target = this;
                args = $__default["default"].extend({}, $__default["default"].fn.filterMultiSelect.args, args);
                if (typeof args.placeholderText === "undefined") args.placeholderText = "nothing selected";
                if (typeof args.filterText === "undefined") args.filterText = "Filter";
                if (typeof args.selectAllText === "undefined") args.selectAllText = "Select All";
                if (typeof args.labelText === "undefined") args.labelText = "";
                if (typeof args.selectionLimit === "undefined") args.selectionLimit = 0;
                if (typeof args.caseSensitive === "undefined") args.caseSensitive = false;
                if (typeof args.allowEnablingAndDisabling === "undefined") args.allowEnablingAndDisabling = true;
                if (typeof args.items === "undefined") args.items = new Array;
                var filterMultiSelect = new FilterMultiSelect(target, args);
                var fms = $__default["default"](filterMultiSelect.getRootElement());
                target.replaceWith(fms);
                var methods = {
                    hasOption: function(value) {
                        return filterMultiSelect.hasOption(value)
                    },
                    selectOption: function(value) {
                        filterMultiSelect.selectOption(value)
                    },
                    deselectOption: function(value) {
                        filterMultiSelect.deselectOption(value)
                    },
                    isOptionSelected: function(value) {
                        return filterMultiSelect.isOptionSelected(value)
                    },
                    enableOption: function(value) {
                        filterMultiSelect.enableOption(value)
                    },
                    disableOption: function(value) {
                        filterMultiSelect.disableOption(value)
                    },
                    isOptionDisabled: function(value) {
                        return filterMultiSelect.isOptionDisabled(value)
                    },
                    enable: function() {
                        filterMultiSelect.enable()
                    },
                    disable: function() {
                        filterMultiSelect.disable()
                    },
                    selectAll: function() {
                        filterMultiSelect.selectAll()
                    },
                    deselectAll: function() {
                        filterMultiSelect.deselectAll()
                    },
                    getSelectedOptionsAsJson: function(includeDisabled) {
                        if (includeDisabled === void 0) {
                            includeDisabled = true
                        }
                        return filterMultiSelect.getSelectedOptionsAsJson(includeDisabled)
                    }
                };
                $__default["default"].fn.filterMultiSelect.applied.push(methods);
                return methods
            };
            $__default["default"](function() {
                var selector = typeof $__default["default"].fn.filterMultiSelect.selector === "undefined" ?
                    "select.filter-multi-select" : $__default["default"].fn.filterMultiSelect.selector;
                var s = $__default["default"](selector);
                s.each(function(i, e) {
                    $__default["default"](e).filterMultiSelect()
                })
            });
            $__default["default"].fn.filterMultiSelect.applied = new Array;
            $__default["default"].fn.filterMultiSelect.selector = undefined;
            $__default["default"].fn.filterMultiSelect.args = {}
        })($);
        //# sourceMappingURL=filter-multi-select-bundle.min.js.map

        // Use the plugin once the DOM has been loaded.
        $(function() {
            // Apply the plugin
            var notifications = $('#notifications');
            $('#client_id').on("optionselected", function(e) {
                createNotification("selected", e.detail.label);
            });
            $('#year').on("optiondeselected", function(e) {
                createNotification("deselected", e.detail.label);
            });
            $('#payment_status').on("optiondeselected", function(e) {
                createNotification("deselected", e.detail.label);
            });

            function createNotification(event, label) {
                var n = $(document.createElement('span'))
                    .text(event + ' ' + label + "  ")
                    .addClass('notification')
                    .appendTo(notifications)
                    .fadeOut(3000, function() {
                        n.remove();
                    });
            }
            $('#billing_filter_form').on('keypress keyup', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('.ckbCheckAll, .checkBoxClass').click(function() {
                if ($('.ckbCheckAll:checked').length > 0 || $('.checkBoxClass:checked').length > 0) {
                    $('.checkbox-count-content').show(500);
                } else {
                    $('.checkbox-count-content').hide(500);
                }
            })

            const countCheckedAll = function() {
                const counter = $(".checkBoxClass:checked").length;
                $(".checkbox-count").html(counter + " variation selected!");
                console.log(counter + ' variation selected!');
            };

            $(".checkBoxClass").on("click", countCheckedAll);

            $('.ckbCheckAll').click(function() {
                if ($(this).is(":checked")) {
                    //get tr which is visible ..add checked to that checkboxes
                    $('tbody').find('tr:visible .checkBoxClass').prop('checked', true);
                    countCheckedAll();
                } else {
                    //remove checked
                    $(".checkBoxClass").prop('checked', false);
                    $('.checkbox-count-content').hide(500);
                }
            })

            $(".checkBoxClass").change(function() {
                if (!$(this).prop("checked")) {
                    $(".ckbCheckAll").prop("checked", false);
                }
            });


            const aggrFn = {
                "=": (a, b) => a == b,
                "<": (a, b) => a < b,
                ">": (a, b) => a > b,
                "<=": (a, b) => a <= b,
                ">=": (a, b) => a >= b,
            };

            function filterColumns($table) {
                const colFilters = {};
                $table.find("thead .filter").each(function() {
                    colFilters[$(this).index()] = {
                        agg: $(this).find("select").val(),
                        val: $(this).find("input").val(),
                    }
                });
                $table.find("tbody tr").each(function() {
                    const $tr = $(this);
                    const shouldHide = Object.entries(colFilters).some(([k, v]) => {
                        return v.val === "" ? false : !aggrFn[v.agg](parseFloat($tr.find(
                            `td:eq(${k})`).text()), parseFloat(v.val));
                    });
                    $tr.toggleClass("u-none", shouldHide);
                });
            }

            $(".filter").on("input", ":input", function(ev) {
                filterColumns($(this).closest("table"));
            });

        });
    </script>
@endsection
