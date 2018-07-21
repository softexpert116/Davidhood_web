
;(function(App) {
	
	"use strict";
	
	/*
	 * Creates a new web cam capture.
	 *
	 * @param <Element> videoElement The video element where we want to stream the footage.
	 *
	 * @return <Object> The initalized object.
	 *
	 */
	App.WebCamCapture = function(videoElement) {
		var webCamWindow = false;
		var width = 640;
		var height = 480;
		var counter = 1;
		/*
		 * Initializes the object.
		 *
		 * @param <Element> videoElement The video element where we want to stream the footage.
		 *
		 * @return void.
		 *
		 */
		function initialize(videoElement) {
			if(typeof videoElement != 'object') {
				webCamWindow = document.getElementById(videoElement);
			} else {
				webCamWindow = videoElement;
			}
			if(hasSupport()) {
				if(webCamWindow) {
					webCamWindow.style.width = width + 'px';
					webCamWindow.style.height = height + 'px';
					// width = webCamWindow.style.width;
					// height = webCamWindow.style.height;
					startStream();
				}
				
			} else {
				alert('No support found');
			}
		}

		/*
		 * Starts the streaming from the webcamera to the video element.
		 *
		 * @return void.
		 *
		 */
		function startStream() {
			navigator.mediaDevices.getUserMedia({video: true}).then(_stream => {
				if(webCamWindow) {
					var stream = _stream;
					var vendorURL = window.URL || window.webkitURL;

					if (navigator.mozGetUserMedia) {
						webCamWindow.mozSrcObject = stream;
						webCamWindow.play();
					} else {
						webCamWindow.srcObject = stream;
					}
					// video recorder init----------------
					recorder = new MediaRecorder(stream);

					recorder.ondataavailable = e => {
						chunks.push(e.data);
						if(recorder.state == 'inactive')  {
							let blob = new Blob(chunks, {type: 'video/webm' });
							uploadBlob(blob);
						}
					};
					console.log('Recorder init:');
					console.log(recorder);
					record_available_flag = true;
					// -----------------------------------
					
				}			
			});
		}
//------------------ajax_blob uploading-------------------
		function uploadBlob(blob) {
			var formData = new FormData();
			formData.append('blob', blob);
			formData.append('fileType', 'webm');
			$.ajax({
				url: upload_url,
				type: "POST",
				data: formData,
				processData: false,
				contentType: false,
				success: function(jsonResponse) {
					var data = JSON.parse(jsonResponse);

					var li = document.createElement('li')
					var mt = document.createElement('video')
					// var hf = document.createElement('a')
					var p = document.createElement('p')
					mt.controls = true;
					mt.src = data.url;
					mt.style.width = "200px";
					// hf.href = data.url;
					// hf.download = `log.webm`;
					// hf.innerHTML = `donwload`;
					p.innerHTML = data.time;
					p.style.color = "white";
					li.appendChild(mt);
					// li.appendChild(hf);
					li.appendChild(p);
					document.getElementById('ul_log').appendChild(li);
					console.log('Log add successful');
				},
				error: function(response) {
					console.log(response);
				}
			});
		}
		/*
		 * Captures a still image from the video.
		 *
		 * @param <Element> append An optional element where we want to append the image. 
		 *
		 * @return <Element> A canvas element with the image.
		 *
		 */
		function captureImage(append) {
			var canvas = document.createElement('canvas');
			canvas.width = width;
			canvas.height = height;
			var ctx = canvas.getContext('2d');
			ctx.drawImage(webCamWindow, 0, 0, width, height);
			
			var pngImage = canvas.toDataURL("image/png"); 
			
			if(append) {
				append.appendChild(canvas);	
			}
			return canvas;
		}

		/*
		 * Sets the size of the video
		 *
		 * @param <Int> w The width.
		 * @param <Int> h The height.
		 *
		 * @return void.
		 *
		 */
		function setSize(w, h) {
			width = w;
			height = h;
		}

		/*
		 * Checks if the browser supports webcam interfacing.
		 *
		 * @return <Boolean>.
		 *
		 */
		function hasSupport(){
			return !!(navigator.getUserMedia || navigator.webkitGetUserMedia ||
				navigator.mozGetUserMedia || navigator.msGetUserMedia);
		}

		// Initialize on creation.
		initialize(videoElement);

		// Return public interface.
		return {
			setSize: setSize,
			hasSupport: hasSupport,
			captureImage: captureImage
		};
	}

})(MotionDetector);