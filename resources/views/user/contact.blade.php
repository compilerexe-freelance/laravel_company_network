@extends('layouts.header') @section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12" style="//margin-top: 30px;">

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group"><strong>COMPANY INFOMATION</strong></div>
                            <div class="form-group">บริษัท ...</div>
                            <div class="form-group">ที่อยู่ ...</textarea>
                            </div>
                            <div class="form-group">รายละเอียด ...</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <div id="map" style="height: 400px; width: 100%;"></div>
                            <script>
                                function initMap() {
                                    var uluru = {
                                        lat: -25.363,
                                        lng: 131.044
                                    };
                                    var map = new google.maps.Map(document.getElementById('map'), {
                                        zoom: 4,
                                        center: uluru
                                    });
                                    var marker = new google.maps.Marker({
                                        position: uluru,
                                        map: map
                                    });
                                }
                            </script>
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAOvZ1MifC8aSH4GdHbfYzSh_Xt3S_WNA&callback=initMap">
                            </script>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection
