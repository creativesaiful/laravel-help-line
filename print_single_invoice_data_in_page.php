@extends('backend/layouts/master')
@section('content')

    <script>
        function printMedicineInvc() {
            var divContents = document.getElementById("MedicineInvoicePrint").innerHTML;
            var head = document.getElementById("head").innerHTML;
            var scrpt = document.getElementById("scrpt").innerHTML;
            var a = window.open('', '', 'height=3508, width=2480');
            a.document.write(head);
            a.document.write('<body>');
            //a.document.write('<body > <h1>Div contents are <br>');
            a.document.write(divContents);
            a.document.write(scrpt);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>


    <div id="head">
        <!doctype html>
        <html lang="en">

        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

            <title>Checkout Invoice </title>
        </head>
    </div>

    <body>


        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-5">
                    <h4 class="page-title">Medicine Invoice View</h4>

                </div>

                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="{{ route('medicineinvoice.create') }}" class="btn btn-primary btn-rounded"><i
                            class="fa fa-plus"></i> &nbsp; Create Medicine Invoice
                    </a>
                    <a href="{{ route('medicineinvoice.index') }}" class="btn btn-primary btn-rounded"><i
                            class="fa fa-eye"></i> &nbsp; View Medicine Invoice
                    </a>
                    <input class="btn btn-danger btn-rounded" type="button" value="Print Invoice"
                        onclick="printMedicineInvc()">
                </div>

            </div>
            <div id="MedicineInvoicePrint" class="row">
                <div class="col-md-12 mx-5 my-5 ">
                    <div class="card-box" id="">
                        <h4 class="payslip-title">Medicine Invoice</h4>
                        <div class="row mr-5">
                            <table>
                                <tr>
                                    <td>
                                        <div class=" ">
                                            <img src="{{ asset('backend/img/logo.png') }}" class="inv-logo bg-primary"
                                                alt="">
                                            <ul class="list-unstyled mb-0">
                                                <li>Islam Diagnostic Center</li>
                                                <li>1425, Motijheel, B/A, Dhaka</li>
                                                <li>yearulislamonem@gmail.com</li>
                                                <li>01825682260</li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="invoice-details">
                                            <h5 class="text-uppercase">Receipt No: <br>
                                                {{ $ShowMedicineInvoice->med_invoice_REF_NO }}
                                            </h5>
                                            <ul class="list-unstyled">
                                                <li>Invoice Date:
                                                    <span>{{ $ShowMedicineInvoice->med_invoice_date }}</span>
                                                </li>
                                                <li>
                                                    <h5 class="mb-0"><strong>Patient Name:
                                                            {{ $ShowMedicineInvoice->med_invoice_p_name }}</strong></h5>
                                                <li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="row mr-5 mt-5">
                            <div class="col-sm-12">
                                <div>
                                    <h4 class="m-b-10"><strong>Medicine</strong></h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><strong>Medicine name </strong></th>
                                                <th><strong>Medicine BP </strong></th>
                                                <th><strong>Medicine Price </strong></th>
                                                <th><strong>Quantity </strong></th>
                                                <th><strong>Total </strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($ShowMedicineInvoice['Med_invoice_Medicines'] as $item)
                                                <tr>
                                                    <td>{{ $item['medicine']['name'] }}</td>
                                                    <td>{{ $item['medicine']['mg'] }}</td>
                                                    <td>{{ $item['medicine']['price'] }}</td>
                                                    <td>{{ $item->med_invoice_medicine_quantity }}</td>
                                                    <td>{{ $item->med_invoice_total }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4" class="text-right">Total</th>
                                                <th>{{ $ShowMedicineInvoice->med_invoice_total_ammount }}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="4" class="text-right">Discount In Taka ({{$ShowMedicineInvoice->med_invoice_medicine_discount }} %)</th>
                                                <th>{{ $ShowMedicineInvoice->med_invoice_medicine_discount_taka }}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="4" class="text-right">Grand Total</th>
                                                <th>{{ $ShowMedicineInvoice->med_invoice_medicine_total }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 px-5">
                    <div class="col-md-6">
                        <p>Accountant Signature</p>
                    </div>


                </div>
            </div>
        </div>

        <div id="scrpt">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        </div>
    </body>

    </html>


@endsection
