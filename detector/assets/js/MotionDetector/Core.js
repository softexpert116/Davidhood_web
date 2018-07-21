
;(function(App) {

	"use strict";
	
	/*
	 * The core motion detector. Does all the work.
	 *
	 * @return <Object> The initalized object.
	 *
	 */
	App.Core = function() {

		var rendering = false;

		var width = 64;
		var height = 48;

		var webCam = null;
		var imageCompare = null;

		var currentImage = null;
		var oldImage = null;

		var topLeft = [Infinity,Infinity];
		var bottomRight = [0,0];
		var p_motion = null;
		var img_motion = null;
		var p_counter = null;
		var old_timestamp = 0;
		var record_delay = 2;

		var raf = (function(){
			return  window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame ||
			function( callback ){
				window.setTimeout(callback, 1000);
			};
		})();

		/*
		 * Initializes the object.
		 *
		 * @return void.
		 *
		 */
		function initialize() {
			imageCompare = new App.ImageCompare();
			webCam = new App.WebCamCapture(document.getElementById('webCamWindow'));
			console.log('webCam: \n' + webCam);
			console.log(recorder);
			rendering = true;
			p_motion = document.getElementById('p_motion');
			img_motion = document.getElementById('img_motion');
			main();
		}

		/*
		 * Compares to images and updates the position
		 * of the motion div.
		 *
		 * @return void.
		 *
		 */
		function render() {
			oldImage = currentImage;
			currentImage = webCam.captureImage(false);
			if(!oldImage || !currentImage) {
				return;
			}

			var vals = imageCompare.compare(currentImage, oldImage, width, height);

			topLeft[0] = vals.topLeft[0] * 10;
			topLeft[1] = vals.topLeft[1] * 10;

			bottomRight[0] = vals.bottomRight[0] * 10;
			bottomRight[1] = vals.bottomRight[1] * 10;
			var movement = document.getElementById('movement')
			movement.style.top = topLeft[1] + 'px';
			movement.style.left = topLeft[0] + 'px';
			movement.style.width = (bottomRight[0] - topLeft[0]) + 'px';
			movement.style.height = (bottomRight[1] - topLeft[1]) + 'px';

			topLeft = [Infinity,Infinity];
			bottomRight = [0,0]

			var cur_timestamp = Math.floor(Date.now() / 1000);
			if(vals.motionFlag == true) {
				old_timestamp = cur_timestamp;
			} else {
			}
			if ((cur_timestamp - old_timestamp) > record_delay) {
				//record stop
				p_motion.innerHTML = "No Motion was detected.";
				img_motion.src = img_inactive_path;
				if (recorder.state != 'inactive') {
					recorder.stop();
				} 
				movement.style.top = 0;
				movement.style.left = 0;
				movement.style.width = 0;
				movement.style.height = 0;
			} else {
				//record start
				p_motion.innerHTML = "Motion was detected!";
				img_motion.src = img_active_path;
				if (recorder.state == 'inactive') {
					chunks=[];
					recorder.start();
				} 
			}
		}

		/*
		 * The main rendering loop.
		 *
		 * @return void.
		 *
		 */
		function main() {
			try{
				if(record_available_flag == true) {
					render();
				}
			} catch(e) {
				console.log(e);
				return;
			}

			if(rendering == true) {
				raf(main.bind(this));
			}
		}

		initialize();
	};
})(MotionDetector);