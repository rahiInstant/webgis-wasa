<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- css file -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css" />
  <link rel="stylesheet" href="/source/jquery-ui.min.css" />
  <link rel="stylesheet" href="/plugin/sidebar/L.Control.Sidebar.css" />
  <link rel="stylesheet" href="/plugin/sidebar/leaflet-sidebar.css" />
  <link rel="stylesheet" href="/plugin/easy-btn/easy-button.css" />
  <link rel="stylesheet" href="/plugin/geoman/leaflet-geoman.css" />
  <link rel="stylesheet" href="/plugin/alertify/alertify.min.css">
  <link rel="stylesheet" href="/plugin/alertify/default.min.css">
  <link rel="stylesheet" href="/plugin/toastify/toastify.min.css">
  <link
    rel="stylesheet"
    href="/plugin/poly-line-measure/Leaflet.PolylineMeasure.css" />
  <link rel="stylesheet" href="/plugin/mini-map/Control.MiniMap.css" />
  <link
    rel="stylesheet"
    href="/plugin/mouse-position/L.Control.MousePosition.css" />
  <link
    rel="stylesheet"
    href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

  <!-- script file -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet-src.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="/source/jquery-3.2.0.js"></script>
  <script src="/source/jquery-ui.min.js"></script>
  <script src="/plugin/sidebar/L.Control.Sidebar.js"></script>
  <script src="/plugin/sidebar/leaflet-sidebar.js"></script>
  <script src="/plugin/easy-btn/easy-button.js"></script>
  <script src="/plugin/geoman/leaflet-geoman.js"></script>
  <script src="/plugin/poly-line-measure/Leaflet.PolylineMeasure.js"></script>
  <script src="/plugin/mini-map/Control.MiniMap.js"></script>
  <script src="/plugin/mouse-position/L.Control.MousePosition.js"></script>
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <script src="/plugin/leaflet-ajax/leaflet.ajax.js"></script>
  <script src="/plugin/alertify/alertify.min.js"></script>
  <script src="/plugin/toastify/toastify.min.js"></script>
  <script
    src="https://kit.fontawesome.com/22a70726e2.js"
    crossorigin="anonymous"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: "#da373d",
          },
        },
      },
    };
  </script>
  <title>map</title>
</head>

<body>
  <div class="main">
    <div id="sideBar" class="sidebar collapsed">
      <!-- Nav tabs -->
      <div class="sidebar-tabs">
        <ul role="tablist">
          <li>
            <a href="#home" role="tab"><i class="fa fa-house"></i></a>
          </li>
          <li>
            <a href="#point" role="tab"><i class="fa fa-location-dot"></i></a>
          </li>
          <li>
            <a href="#line" role="tab"><i class="fa fa-grip-lines-vertical"></i></a>
          </li>
          <li>
            <a href="#polygon" role="tab"><i class="fa fa-building"></i></a>
          </li>
        </ul>
        <!-- 
          <ul role="tablist">
            <li>
              <a href="#settings" role="tab"><i class="fa fa-gear"></i></a>
            </li>
          </ul> -->
      </div>

      <!-- Tab panes -->
      <div class="sidebar-content">
        <div class="sidebar-pane " id="home">
          <h1 class="sidebar-header">
            Home
            <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
          </h1>
        </div>

        <div class="sidebar-pane" id="point">
          <h1 class="sidebar-header">
            Valve Info<span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
          </h1>
          <div class="mr-4 mt-5">
            <!-- <p class="text-center text-xl font-semibold mt-2">Valve Info</p>
              <hr class="mt-1 mb-2" /> -->
            <div class="flex gap-3 mt-2 flex-row md:max-lg:flex-col">
              <input
                type="text"
                id="valve_id"
                class="p-2 outline-none border rounded-md"
                placeholder="Valve Id" />
              <button
                id="find-valve"
                class="text-center font-medium bg-blue-700 p-1.5 block text-white rounded-md flex-auto">
                Find
              </button>
            </div>
            <p id="valve_info" class="mt-2"></p>
          </div>
          <hr class="my-5 mr-4">
          <!-- new valve starts here. -->
          <div id="newValve" class="mr-4">

            <div class="flex items-center justify-between md:max-lg:flex-col flex-row md:max-lg:items-start gap-3 [&>*]:rounded-md [&>*]:py-2 [&>*]:px-3 text-center text-white ">
              <button type="button" class="bg-cyan-500 w-full" id="btn_valve_form">Insert New Valve</button>
              <button type="button" class="bg-orange-500 w-2/4 md:max-lg:w-full" id="btn_valve_refresh">Refresh</button>
            </div>
            <div id="new_valve_information" class="h-0 p-0 border-none rounded-md mt-5 overflow-clip select-none duration-200">
              <form class="space-y-4">
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="valve_id_new">Valve ID</label>
                  <input type="number" class="border outline-none p-1 rounded-md flex-auto md:max-lg:w-full" name="valve_id_new" id="valve_id_new" required>
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="valve_type">Valve Type</label>
                  <select class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full" name="valve_type" id="valve_type" required>
                    <option value="">----</option>
                    <option value="Gate Valve">Gate Valve</option>
                    <option value="Washout Valve">Washout Valve</option>
                    <option value="Air Release Valve">Air Release Valve</option>
                  </select>
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="valve_dma_id">DMA ID</label>
                  <input type="number" class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full" name="valve_dma_id" id="valve_dma_id" required>
                </div>

                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="valve_diameter">Diameter (mm)</label>
                  <input type="number" class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full" name="valve_diameter" id="valve_diameter" required>
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="valve_visibility">Visibility</label>
                  <select class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full" name="valve_visibility" id="valve_visibility" required>
                    <option value=""></option>
                    <option value="Visible">Visible</option>
                    <option value="Invisible">Invisible</option>
                  </select>
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="valve_location">Location</label>
                  <input type="text" class="border outline-none p-1.5 rounded-md flex-1 md:max-lg:w-full" name="valve_location" id="valve_location" required>
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="valve_geometry">Geometry</label>
                  <textarea name="valve_geometry" id="valve_geometry" disabled class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full" required></textarea>
                </div>
                <div class="flex items-center justify-between flex-row md:max-lg:flex-col gap-3 [&>*]:border [&>*]:duration-200 [&>*]:font-semibold [&>*]:rounded-md [&>*]:py-2 [&>*]:px-3 text-center ">
                  <button type="button" class="text-red-700 border-red-700 hover:bg-red-700 hover:text-white w-full" id="btn_valve_cancel">Cancel</button>
                  <button type="submit" class="text-green-700 border-green-700 hover:bg-green-700 hover:text-white w-full" id="btn_valve_insert">Insert Valve</button>
                </div>
              </form>
            </div>
            <!-- new valves ends here -->
          </div>
        </div>

        <div class="sidebar-pane" id="line">
          <h1 class="sidebar-header">
            Pipeline Info<span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
          </h1>
          <div class="mr-4 mt-5">
            <div>
              <div class="flex gap-3 mt-2 flex-row md:max-lg:flex-col">
                <input
                  type="text"
                  id="pipe_id"
                  class="p-2 outline-none border rounded-md"
                  placeholder="Pipeline Id" />
                <button
                  id="find_pipe"
                  class="text-center font-medium bg-blue-700 p-1.5 block text-white rounded-md flex-auto">
                  Find
                </button>
              </div>
            </div>
            <p id="pipe_info" class="mt-2"></p>
          </div>
          <hr class="my-5 mr-4">
          <!-- new valve starts here. -->
          <div id="newPipe" class="mr-4 ">

            <div class="flex items-center justify-between md:max-lg:flex-col flex-row md:max-lg:items-start gap-3 [&>*]:rounded-md [&>*]:py-2 [&>*]:px-3 text-center text-white ">
              <button type="button" class="bg-cyan-500 w-full" id="btn_pipe_form">Insert New Valve</button>
              <button type="button" class="bg-orange-500 w-2/4 md:max-lg:w-full" id="btn_pipe_refresh">Refresh</button>
            </div>
            <div id="new_pipe_information" class="h-0 p-0 border-none rounded-md mt-5 overflow-clip select-none duration-200 ">
              <form action="" class="space-y-4">
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="pipe_id_new">pipe ID</label>
                  <input type="text" class="border outline-none p-1 rounded-md flex-auto md:max-lg:w-full" name="pipe_id_new" id="pipe_id_new">
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="pipe_type">Category</label>
                  <select class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full" name="pipe_type" id="pipe_type">
                    <option value="">---</option>
                    <option value="Distribution Pipeline">Distribution Pipeline</option>
                    <option value="Reticulation Pipeline">Reticulation Pipeline</option>
                    <option value="Transmission pipeline">Transmission pipeline</option>
                  </select>
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="pipe_dma_id">DMA ID</label>
                  <input type="text" class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full" name="pipe_dma_id" id="pipe_dma_id">
                </div>

                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="pipe_diameter">Diameter (mm)</label>
                  <input type="text" class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full" name="pipe_diameter" id="valve_diameter">
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="pipe_method">Method</label>
                  <select class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full" name="pipe_method" id="pipe_method">
                    <option value="">---</option>
                    <option value="HDD">HD</option>
                    <option value="OT">OTT</option>
                  </select>
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="pipe_location">Location</label>
                  <input type="text" class="border outline-none p-1.5 rounded-md flex-1 md:max-lg:w-full" name="pipe_location" id="pipe_location">
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="pipe_geometry">Geometry</label>
                  <textarea name="pipe_geometry" id="pipe_geometry" disabled class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full"></textarea>
                </div>
                <div class="flex items-center justify-between flex-row md:max-lg:flex-col gap-3 [&>*]:border [&>*]:duration-200 [&>*]:font-semibold [&>*]:rounded-md [&>*]:py-2 [&>*]:px-3 text-center ">
                  <button type="button" class="text-red-700 border-red-700 hover:bg-red-700 hover:text-white w-full" id="btn_pipe_cancel">Cancel</button>
                  <button type="submit" class="text-green-700 border-green-700 hover:bg-green-700 hover:text-white w-full" id="btn_pipe_insert">Insert Pipe</button>
                </div>
              </form>
            </div>
            <!-- new valves ends here -->
          </div>
        </div>

        <div class="sidebar-pane" id="polygon">
          <h1 class="sidebar-header">
            Building Info<span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
          </h1>
          <div class="mr-4 mt-5">
            <div>
              <!-- <p class="text-center text-xl font-semibold mt-2">
                  Building Info
                </p>
                <hr class="mt-1 mb-2" /> -->
              <div class="flex gap-3 mt-2">
                <input
                  type="text"
                  id="building_id"
                  class="p-2 outline-none border rounded-md"
                  placeholder="Building Id" />
                <button
                  id="find_build"
                  class="text-center font-medium bg-blue-700 p-1.5 block text-white rounded-md flex-auto">
                  Find
                </button>
              </div>
            </div>
            <p id="build_info" class="mt-2"></p>
          </div>
          <hr class="my-5 mr-4">
          <!-- new Building starts here. -->
          <div id="newBuilding" class="mr-4 ">
            <div class="flex items-center justify-between md:max-lg:flex-col flex-row md:max-lg:items-start gap-3 [&>*]:rounded-md [&>*]:py-2 [&>*]:px-3 text-center text-white ">
              <button type="button" class="bg-cyan-500 w-full" id="btn_building_form">Insert New Building</button>
              <button type="button" class="bg-orange-500 w-2/4 md:max-lg:w-full" id="btn_building_refresh">Refresh</button>
            </div>
            <div id="new_building_information" class="h-0 p-0 border-none rounded-md mt-5 overflow-clip select-none duration-200 ">
              <form action="" class="space-y-4">
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="building_id_new">building ID</label>
                  <input type="text" class="border outline-none p-1 rounded-md flex-auto md:max-lg:w-full" name="building_id_new" id="building_id_new">
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="building_type">Category</label>
                  <select class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full" name="building_type" id="building_type">
                    <option value="">---</option>
                    <option value="Building">Building</option>
                    <option value="Open Plot">Open Plot</option>
                    <option value="Tin Shed">Tin Shed</option>
                    <option value="Under Construction">Under Construction</option>
                  </select>
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="building_dma_id">DMA ID</label>
                  <input type="text" class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full" name="building_dma_id" id="building_dma_id">
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="building_storey">Storey</label>
                  <input type="text" class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full" name="building_storey" id="building_storey">
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="building_population">Population</label>
                  <input type="text" class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full" name="building_population" id="building_population">
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="building_location">Location</label>
                  <input type="text" class="border outline-none p-1.5 rounded-md flex-1 md:max-lg:w-full" name="building_location" id="building_location">
                </div>
                <div class="flex gap-2 items-center md:max-lg:items-start flex-row md:max-lg:flex-col">
                  <label class="font-normal md:font-medium " for="building_geometry">Geometry</label>
                  <textarea name="building_geometry" id="building_geometry" disabled class="border outline-none p-1.5 rounded-md flex-auto md:max-lg:w-full"></textarea>
                </div>
                <div class="flex items-center justify-between flex-row md:max-lg:flex-col gap-3 [&>*]:border [&>*]:duration-200 [&>*]:font-semibold [&>*]:rounded-md [&>*]:py-2 [&>*]:px-3 text-center ">
                  <button type="button" class="text-red-700 border-red-700 hover:bg-red-700 hover:text-white w-full" id="btn_building_cancel">Cancel</button>
                  <button type="submit" class="text-green-700 border-green-700 hover:bg-green-700 hover:text-white w-full" id="btn_building_insert">Insert Building</button>
                </div>
            </div>
            </form>
          </div>
          <!-- new Building ends here -->
        </div>
      </div>
    </div>
  </div>

  <div id="mapDiv" class="w-full h-screen"></div>
  </div>
  <!-- <script src="map.js"></script> -->
  <script>
    var valveForm = document.getElementById("valve_form");

    let center = [22.39, 91.81];

    var map = L.map("mapDiv", {
      center: center,
      zoom: 16,
      maxZoom: 22,
      attributionControl: false,
      zoomControl: false,
    });

    //==> base maps
    var googleMap = L.tileLayer(
      "http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
        // maxZoom: 23,
        subdomains: ["mt0", "mt1", "mt2", "mt3"],
      }
    ).addTo(map);

    var openStreetMap = L.tileLayer(
      "https://tile.openstreetmap.org/{z}/{x}/{y}.png"
    );

    var cartoDB = L.tileLayer(
      "https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png", {
        subdomains: "abcd",
        // maxZoom: 20,
      }
    );

    var EsriWorldImagery = L.tileLayer(
      "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}", {
        // maxZoom: 23,
      }
    );

    //==> side bar
    var sidebar = L.control.sidebar("sideBar", {
      position: "left",
    });

    map.addControl(sidebar);

    //==> easy button
    // var helloPopup = L.popup().setContent('Hello World!');

    // L.easyButton("fa-right-left", function sideBarToggle() {
    //   sidebar.toggle();
    // }).addTo(map);

    //==> map scale

    L.control
      .scale({
        imperial: false,
        position: "bottomright",
        maxWidth: 200,
      })
      .addTo(map);

    //===> zoom control
    L.control
      .zoom({
        position: "topright",
      })
      .addTo(map);

    //==> geoman
    map.pm.addControls({
      position: "topright",
      editMode: true,
      // dragMode: true,
    });

    function customToast(text) {
      Toastify({
        text: text,
        duration: 3000,
        position: "center",
      }).showToast();
    }

    var toastMsg = (title) => `${title} `;

    function customAlert(id, json, title, description, e) {
      alertify.confirm(
        title,
        description,
        function() {
          $(id).val(JSON.stringify(json));
          customToast(`${title} captured.`);
        },
        function() {
          customToast(`${title} not captured.`);
          e.layer.remove();
        }
      );
    }

    map.on("pm:create", (e) => {
      var json = e.layer.toGeoJSON().geometry;
      // console.log(e.layer.toGeoJSON().geometry);
      // console.log(JSON.stringify(e.layer.toGeoJSON().geometry));
      // map.on("remove", (e) => {})

      // console.log(e.layer)
      if (e.shape == "Marker") {
        customAlert(
          "#valve_geometry",
          json,
          "Point Feature",
          "Are you sure to capture this point?",
          e
        );
      } else if (e.shape == "Line") {
        json.type = "MultiLineString";
        customAlert(
          "#pipe_geometry",
          json,
          "Line Feature",
          "Are you sure to capture this Line?",
          e
        );
      } else if ((e.shape = "polygon")) {
        json.type = "MultiPolygon";
        customAlert(
          "#building_geometry",
          json,
          "Polygon Feature",
          "Are you sure to capture this Polygon?",
          e
        );
      }
      // workingLayer.on("pm:vertexadded", (e) => {
      //   console.log(e);
      // });
    });

    map.on("pm:remove", (e) => {
      console.log(e);
      console.log(e.layer.feature.properties.valve_id);
      var valve_id = e.layer.feature.properties.valve_id;
      $.ajax({
        url: "delete_data.php",
        type: "POST",
        data: {
          id: valve_id,
          request: "valve"
        },
        success: function(res) {
          if (res.includes("ERROR")) {
            console.log(res);
          } else {
            // customToast('valve deleted successfully.')
            console.log(res);
          }
        },
        error: function(xhr, status, error) {
          console.log(error);
        },
      });
    });

    //===> poly-line-measure
    L.control
      .polylineMeasure({
        position: "topleft",
      })
      .addTo(map);

    //===> mini-map
    var osm2 = new L.TileLayer(
      "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}", {
        position: "bottomright",
      }
    );
    var miniMap = new L.Control.MiniMap(osm2).addTo(map);

    //===> mouse position

    L.control
      .mousePosition({
        position: "bottomright",
      })
      .addTo(map);

    //===> base layer

    var baseLayers = {
      "Google Map": googleMap,
      openStreetMap,
      cartoDB,
      EsriWorldImagery,
    };
    var overlays;
    // var overlays = {
    //   "Marker": marker,
    //   "Roads": roadsLayer
    // };

    var control_layers = L.control.layers(baseLayers, overlays).addTo(map);

    //===> search bar
    L.Control.geocoder({
      position: "topleft",
    }).addTo(map);

    //===> leaflet ajax
    var layerSearch;

    // VALVES
    var valveArray = [];
    var layerValves;

    // var count = 0;

    // var valves = new L.GeoJSON.AJAX("/data/valves_105.geojson", {
    //   pointToLayer: style_valves,
    // }).addTo(map);
    load_valves();

    // layerValves.on("data:loaded", function loadEventHandler() {
    //   $("#valve_id").autocomplete({
    //     source: valveArray,
    //   });
    // });

    function load_valves() {
      $.ajax({
        url: "load_data.php",
        data: {
          table: "valves",
        },
        type: "POST",
        success: function(res) {
          if (res.includes("ERROR")) {
            console.log(res);
          } else {
            var jsnValve = JSON.parse(res);
            if (layerValves) {
              layerValves.remove();
              control_layers.removeLayer(layerValves);
            }
            layerValves = L.geoJSON(jsnValve, {
              pointToLayer: style_valves,
            }).addTo(map);
            control_layers.addOverlay(layerValves, "Valves");
            map.fitBounds(layerValves.getBounds());
          }
        },
        error: function(xhr, status, error) {
          console.log(error);
        },
      });
    }

    function style_valves(json, latLang) {
      // console.log(json);
      var properties = json.properties;
      // console.log(properties);
      valveArray.push(properties.valve_id);
      var color;
      var fillColor;

      switch (properties.valve_type) {
        case "Gate Valve":
          color = "#800000";
          fillColor = "#800000";
          break;
        case "Air Release Valve":
          color = "#006f00";
          fillColor = "#88d253";
          break;
        case "Washout Valve":
          color = "#1a5f85";
          fillColor = "#4dbcdc";
          break;
        default:
          color = "#d34d2f";
          fillColor = "#fb7756";
          break;
      }

      var style = {
        color,
        fillColor,
        fillOpacity: 1,
        radius: 5,
      };

      return L.circleMarker(latLang, style).bindTooltip(`
* Valve Id: ${properties.valve_id}
<br>* Valve Type: ${properties.valve_type}
<br>* Diameter: ${properties.valve_diameter}
<br>* Location: ${properties.valve_location}
`);
    }

    $("#valve_id").autocomplete({
      source: valveArray,
    });

    $("#find-valve").click(function() {
      var valve_id = $("#valve_id").val();
      returnLayerByAttribute("valves", "valve_id", valve_id, function(layer) {
        console.log(layer);
        if (layer) {
          var properties = layer.feature.properties;
          // console.log(attribute);
          // console.log(layerSearch);
          if (layerSearch) {
            layerSearch.remove();
          }
          layerSearch = L.circle(layer.getLatLng(), {
            radius: 20,
            color: "red",
            weight: 10,
            opacity: 0.6,
            fillOpacity: 0.3,
          }).addTo(map);

          map.setView(layer.getLatLng(), 18);

          $("#valve_info").html(`
  * Valve Id: ${properties.valve_id}
  <br>* Valve Type: ${properties.valve_type}
  <br>* Diameter: ${properties.valve_diameter}
  <br>* Location: ${properties.valve_location}
    `);

          layerValves.bringToFront();
        } else {
          $("#valve_info").html("Valve not found.");
        }
      });
    });

    // PIPELINES
    var pipeline_array = [];
    var layerPipelines;

    load_pipelines();

    function load_pipelines() {
      $.ajax({
        url: "/load_data.php",
        data: {
          table: "pipelines",
        },
        type: "POST",
        success: function(res) {
          if (res.includes("ERROR")) {
            console.log(res);
          } else {
            var jsnPipelines = JSON.parse(res);
            if (layerPipelines) {
              layerPipelines.remove();
              control_layers.removeLayer(layerPipelines);
            }
            layerPipelines = L.geoJSON(jsnPipelines, {
              style: style_pipeline,
              onEachFeature: process_pipeline,
            }).addTo(map);
            control_layers.addOverlay(layerPipelines, "Pipelines");
          }
        },
        error: function(xhr, status, error) {
          console.log(error);
        },
      });
    }

    // var pipelines = L.geoJSON
    //   .ajax("data/pipelines_105.geojson", {
    //     style: style_pipeline,
    //     onEachFeature: process_pipeline,
    //   })
    //   .addTo(map);

    function style_pipeline(json) {
      // console.log(json);
      var attribute = json.properties;
      var color;

      switch (attribute.pipeline_category) {
        case "Distribution Pipeline":
          color = "#2980b9";
          break;

        case "Transmission Pipeline":
          color = "#b7950b";
          break;

        case "Reticulation Pipeline":
          color = "#7A1CAC";
          break;

        default:
          color = "#d34d2f";
          break;
      }

      return {
        color,
      };
    }

    $("#pipe_id").autocomplete({
      source: pipeline_array,
    });

    function process_pipeline(json, layer) {
      // console.log(json);
      // console.log(layer);
      var attribute = json.properties;
      pipeline_array.push(attribute.pipe_id);
      layer.bindTooltip(`
* Pipe Id: ${attribute.pipe_id}
<br>* Pipeline Address: ${attribute.pipeline_location}
<br>* Diameter: ${attribute.pipeline_diameter}
<br>* Pipeline Length: ${attribute.length}
`);
    }

    // control_layers.addOverlay(pipelines, "pipelines");

    $("#find_pipe").click(function() {
      var pipe_id = $("#pipe_id").val();
      returnLayerByAttribute("pipelines", "pipe_id", pipe_id, function(layer) {
        if (layer) {
          var properties = layer.feature.properties;
          // console.log(attribute);
          // console.log(layerSearch);
          if (layerSearch) {
            layerSearch.remove();
          }
          layerSearch = L.geoJSON(layer.toGeoJSON(), {
            style: {
              color: "red",
              opacity: 0.6,
              weight: 10,
            },
          }).addTo(map);

          map.fitBounds(layer.getBounds());

          $("#pipe_info").html(`
* Pipe Id: ${properties.pipe_id}
<br>* Pipeline Address: ${properties.pipeline_location}
<br>* Diameter: ${properties.pipeline_diameter}
<br>* Category: ${properties.pipeline_category}
<br>* Pipeline Length: ${properties.length}
  `);

          layerPipelines.bringToFront();
        } else {
          $("#pipe_info").html("pipeline not found.");
        }
      });
    });

    // BUILDINGS

    var building_array = [];
    load_Buildings();
    var layerBuildings;

    function load_Buildings() {
      $.ajax({
        url: "/load_data.php",
        data: {
          table: "buildings",
        },
        type: "POST",
        success: function(res) {
          if (res.includes("ERROR")) {
            console.log(res);
          } else {
            var jsnBuildings = JSON.parse(res);
            if (layerBuildings) {
              layerBuildings.remove();
              control_layers.removeLayer(layerBuildings);
            }
            layerBuildings = L.geoJSON(jsnBuildings, {
              style: style_buildings,
              onEachFeature: process_buildings,
            }).addTo(map);
            control_layers.addOverlay(layerBuildings, "Buildings");
          }
        },
        error: function(xhr, status, error) {
          console.log(error);
        },
      });
    }

    // var buildings = L.geoJSON
    //   .ajax("/data/buildings_105.geojson", {
    //     style: style_buildings,
    //     onEachFeature: process_buildings,
    //   })
    //   .addTo(map);

    function style_buildings(json) {
      // console.log(json);
      var attribute = json.properties;
      var storey = attribute.building_storey;
      var color;
      var fillColor;
      var fillOpacity = 1;

      switch (attribute.building_category) {
        case "Building":
          if (storey >= 10) {
            color = "#f9ebea";
            fillColor = "#f9ebea";
          } else if (storey >= 8) {
            color = "#f5eef8";
            fillColor = "#f5eef8";
          } else if (storey >= 5) {
            color = "#fdf2e9";
            fillColor = "#fdf2e9";
          } else if (storey >= 3) {
            color = "#eb984e";
            fillColor = "#eb984e";
          } else {
            color = "#c39bd3";
            fillColor = "#c39bd3";
          }
          break;
        case "Tin Shed":
          color = "#378CE7";
          fillColor = "#67C6E3";
          fillOpacity = 0.9;
          break;

        case "Open Plot":
          color = "#80AF81";
          fillColor = "#A2CA71";
          break;
        case "Under Construction":
          color = "#229954";
          fillColor = "#229954";
          break;

        default:
          color = "#17202A";
          fillColor = "#17202A";
          break;
      }
      return {
        color,
        fillColor,
        fillOpacity,
      };
    }

    $("#building_id").autocomplete({
      source: building_array,
    });

    function process_buildings(json, layer) {
      // console.log(json);
      // console.log(layer);

      var attribute = json.properties;
      if (attribute.building_id) {
        building_array.push(attribute.building_id.toString());
      }
      layer.bindPopup(`
* Building Category: ${attribute.building_category}
<br>* Building Storey: ${attribute.building_storey}
<br>* Population: ${attribute.building_population}
<br>* Building Account No: ${attribute.building_id}
`);
    }

    // control_layers.addOverlay(buildings, "Buildings");

    $("#find_build").click(function() {
      var build_id = $("#building_id").val();
      returnLayerByAttribute(
        "buildings",
        "building_id",
        build_id,
        function(layer) {
          if (layer) {
            var properties = layer.feature.properties;
            // console.log(attribute);
            // console.log(layerSearch);
            if (layerSearch) {
              layerSearch.remove();
            }
            layerSearch = L.geoJSON(layer.toGeoJSON(), {
              style: {
                color: "red",
                opacity: 1,
                fillOpacity: 0,
                weight: 10,
              },
            }).addTo(map);

            map.fitBounds(layer.getBounds());

            $("#build_info").html(`
* Building Category: ${properties.building_category}
<br>* Building Storey: ${properties.building_storey}
<br>* Population: ${properties.building_population}
<br>* Building Account No: ${properties.building_id}
  `);

            // buildings.bringToFront();
          } else {
            $("#build_info").html("building not found.");
          }
        }
      );
    });

    // utility
    function returnLayerByAttribute(table, field, value, callback) {
      $.ajax({
        url: "/find_data.php",
        data: {
          table,
          field,
          value,
        },
        type: "POST",
        success: function(res) {
          if (res.includes("ERROR")) {
            console.log(res);
          } else {
            var layers = L.geoJSON(JSON.parse(res)).getLayers();
            if (layers.length > 0) {
              callback(layers[0]);
            } else {
              callback(false);
            }
          }
        },
        error: function(xhr, status, err) {
          console.log("ERROR", err);
        },
      });
    }

    function showForm(id) {
      $(id).removeClass("h-0 p-0 border-none");
      $(id).addClass("h-auto p-4 border");
    }

    function hideForm(id) {
      $(id).addClass("h-0 p-0 border-none");
      $(id).removeClass("h-auto p-4 border");
    }

    $("#btn_valve_form").click(() => showForm("#new_valve_information"));
    $("#btn_valve_cancel").click(() => hideForm("#new_valve_information"));
    $("#btn_pipe_form").click(() => showForm("#new_pipe_information"));
    $("#btn_pipe_cancel").click(() => hideForm("#new_pipe_information"));
    $("#btn_building_form").click(() => showForm("#new_building_information"));
    $("#btn_building_cancel").click(() => hideForm("#new_building_information"));

    valveForm.addEventListener("submit", function(e) {
      function getValue(name) {
        return e.target[name].value;
      }
      var valve_info = {
        valve_id_new: getValue("valve_id_new"),
        valve_type: getValue("valve_type"),
        valve_dma_id: getValue("valve_dma_id"),
        valve_diameter: getValue("valve_diameter"),
        valve_visibility: getValue("valve_visibility"),
        valve_location: getValue("valve_location"),
        valve_geometry: getValue("valve_geometry"),
        request: "valves",
      };
      console.log(valve_info);
      //   valveForm.reset();
      $.ajax({
        url: "insert_data.php",
        type: "POST",
        data: valve_info,
        success: function(res) {
          if (res.includes("ERROR")) {
            customToast(`${res}`);
          } else {
            customToast("New valve inserted successfully.");
          }
        },
        error: function(xhr, status, error) {
          customToast(`${error}`);
        },
      });
    });

    // $('#valve_form').submit(function(e) {

    //     console.log(e)
    // })

    // abdur_Rahaman/123
  </script>
</body>

</html>