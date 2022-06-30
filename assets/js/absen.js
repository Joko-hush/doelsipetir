var result;

function getloc() {
	navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
}
$(document).ready(function getLocation() {
	result = document.getElementById("latitude");
	//
	if (navigator.geolocation) {
		setTimeout(getloc, 3000);
	} else {
		swal({
			title: "Oops!",
			text: "Maaf, browser Anda tidak mendukung geolokasi HTML5.",
			icon: "error",
			timer: 3000,
		});
	}
});

// Define callback function for successful attempt
function successCallback(position) {
	result.innerHTML =
		"" + position.coords.latitude + "," + position.coords.longitude + "";
}

// Define callback function for failed attempt
function errorCallback(error) {
	if (error.code == 1) {
		swal({
			title: "Oops!",
			text: "Anda telah memutuskan untuk tidak membagikan posisi Anda, tetapi tidak apa-apa. Kami tidak akan meminta Anda lagi.",
			icon: "error",
			timer: 3000,
		});
	} else if (error.code == 2) {
		swal({
			title: "Oops!",
			text: "Jaringan tidak aktif atau layanan penentuan posisi tidak dapat dijangkau.",
			icon: "error",
			timer: 3000,
		});
	} else if (error.code == 3) {
		swal({
			title: "Oops!",
			text: "Waktu percobaan habis sebelum bisa mendapatkan data lokasi.",
			icon: "error",
			timer: 3000,
		});
	} else {
		swal({
			title: "Oops!",
			text: "Waktu percobaan habis sebelum bisa mendapatkan data lokasi.",
			icon: "error",
			timer: 3000,
		});
	}
}

// start webcam
Webcam.set({
	width: 312,
	height: 312,
	image_format: "jpeg",
	jpeg_quality: 80,
});

var cameras = new Array(); //create empty array to later insert available devices
navigator.mediaDevices
	.enumerateDevices() // get the available devices found in the machine
	.then(function (devices) {
		devices.forEach(function (device) {
			var i = 0;
			if (device.kind === "videoinput") {
				//filter video devices only
				cameras[i] = device.deviceId; // save the camera id's in the camera array
				i++;
			}
		});
	});

Webcam.set("constraints", {
	width: 312,
	height: 312,
	image_format: "jpeg",
	jpeg_quality: 80,
	sourceId: cameras[0],
});

Webcam.attach(".webcam-capture");
// preload shutter audio clip
var shutter = new Audio();
//shutter.autoplay = true;
shutter.src = navigator.userAgent.match(/Firefox/)
	? "../assets/webcamjs/shutter.ogg"
	: "../assets/webcamjs/shutter.mp3";

function captureimagedd() {
	var latitude = $(".latitude").html();
	// play sound effect
	shutter.play();
	// take snapshot and get image data
	Webcam.snap(function (data_uri) {
		// display results in page
		Webcam.upload(
			data_uri,
			"../absensi/action?action=absendd&latitude=" + latitude + "",
			function (code, text) {
				$data = "" + text + "";
				var results = $data.split("/");
				$results = results[0];
				$results2 = results[1];
				if ($results == "success") {
					swal({
						title: "Berhasil!",
						text: $results2,
						icon: "success",
						timer: 3500,
					});
					setTimeout("location.href = '../member';", 3500);
				} else {
					swal({
						title: "Oops!",
						text: text,
						icon: "error",
						timer: 3500,
					});
					setTimeout("location.href = '../member';", 3500);
				}
			}
		);
	});
}
