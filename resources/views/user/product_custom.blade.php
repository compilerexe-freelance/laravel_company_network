@extends('layouts.header') @section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12" style="//margin-top: 30px;">

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="col-md-3 text-center">
                        <div class="form-group">
                            <ul>SERVER
                                <li style="list-style-type: none;"><a href="#">TOWER</a></li>
                                <li style="list-style-type: none;"><a href="#">RACK 1 U</a></li>
                                <li style="list-style-type: none;"><a href="#">RACK 2 U</a></li>
                                <li style="list-style-type: none;"><a href="#">HYPER-CONVERGED</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 text-center">
                        <div class="form-group">
                            <ul>WORKSTATION
                                <li style="list-style-type: none;"><a href="#">DELL</a></li>
                                <li style="list-style-type: none;"><a href="#">LENOVO</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <div class="form-group">
                            <hr>
                            <strong style="font-size: 20px;">SERVER <i class="fa fa-angle-right"></i> TOWER</strong>
                            <hr>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <div class="form-group">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">สินค้า</th>
                                        <th class="text-center">รายละเอียด</th>
                                        <th class="text-center">ราคา</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="http://i.ebayimg.com/00/s/MzAyWDY4Nw==/z/yvYAAOxyVaBS-Ome/$_32.JPG" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[805667-B21] HPE 4GB 1Rx8 PC4-2133P-E-15 STND Kit</td>
                                        <td>+ 7,500 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="http://www.partsinthebox.com/media/catalog/product/cache/1/small_image/300x300/9df78eab33525d08d6e5fb8d27136e95/_/3/_3_2_5.jpg" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[843266-B21] HPE 1TB 6G SATA 7.2K 3.5in NHP ETY HDD</td>
                                        <td>+ 5,000 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                    <tr class="table-success">
                                        <td></td>
                                        <td>รวมราคา</td>
                                        <td>12,500 Bath</td>
                                        <td colspan="2"><a href="{{ url('quotation/create') }}"><button type="button" class="btn btn-success"><i class="fa fa-shopping-cart fa-lg"></i> สร้างใบเสนอราคา</button></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-12 text-md-center">
                        <div class="form-group">
                            <hr>
                            <strong style="font-size: 20px;">เลือกสินค้า</strong>
                            <hr>
                        </div>
                    </div>

                    <div class="col-md-12 text-md-center">
                        <div class="form-group">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-md-center">RAM</th>
                                        <th class="text-md-center">รายละเอียด</th>
                                        <th class="text-md-center">ราคา</th>
                                        <th class="text-md-center"></th>
                                        <th class="text-md-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="http://i.ebayimg.com/00/s/MzAyWDY4Nw==/z/yvYAAOxyVaBS-Ome/$_32.JPG" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[805667-B21] HPE 4GB 1Rx8 PC4-2133P-E-15 STND Kit</td>
                                        <td>+ 7,500 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="http://i.ebayimg.com/00/s/MzAyWDY4Nw==/z/yvYAAOxyVaBS-Ome/$_32.JPG" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[805667-B21] HPE 4GB 1Rx8 PC4-2133P-E-15 STND Kit</td>
                                        <td>+ 7,500 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="http://i.ebayimg.com/00/s/MzAyWDY4Nw==/z/yvYAAOxyVaBS-Ome/$_32.JPG" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[805667-B21] HPE 4GB 1Rx8 PC4-2133P-E-15 STND Kit</td>
                                        <td>+ 7,500 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-12 text-md-center">
                        <div class="form-group">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-md-center">HARDDISK</th>
                                        <th class="text-md-center">รายละเอียด</th>
                                        <th class="text-md-center">ราคา</th>
                                        <th class="text-md-center"></th>
                                        <th class="text-md-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="http://www.partsinthebox.com/media/catalog/product/cache/1/small_image/300x300/9df78eab33525d08d6e5fb8d27136e95/_/3/_3_2_5.jpg" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[843266-B21] HPE 1TB 6G SATA 7.2K 3.5in NHP ETY HDD</td>
                                        <td>+ 5,000 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="http://www.partsinthebox.com/media/catalog/product/cache/1/small_image/300x300/9df78eab33525d08d6e5fb8d27136e95/_/3/_3_2_5.jpg" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[843266-B21] HPE 1TB 6G SATA 7.2K 3.5in NHP ETY HDD</td>
                                        <td>+ 5,000 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="http://www.partsinthebox.com/media/catalog/product/cache/1/small_image/300x300/9df78eab33525d08d6e5fb8d27136e95/_/3/_3_2_5.jpg" alt="" style="width: 100px; height: 90px;"></td>
                                        <td>[843266-B21] HPE 1TB 6G SATA 7.2K 3.5in NHP ETY HDD</td>
                                        <td>+ 5,000 Baht</td>
                                        <td><button type="button" class="btn btn-success" style="width: 100px;">Add</button></td>
                                        <td><button type="button" class="btn btn-warning" style="width: 100px;">Remove</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection
