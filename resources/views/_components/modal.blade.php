<div class="h-screen w-full flex flex-col items-center justify-center bg-teal-lightest font-sans">
	<div v-if="modal.visible" @click.self="modal.visible = false" class="h-screen w-full absolute flex items-center justify-center bg-modal">
        <div class="bg-white rounded shadow p-8 m-4 max-w-xs max-h-full text-center overflow-y-scroll">
            <div class="mb-4">
                <h1>Welcome!</h1>
            </div>
            <div class="mb-8">
                <p>Ready to get started? Keep scrolling to see some great components.</p>
            </div>
            <div class="flex justify-center">
                <button class="flex-no-shrink text-white py-2 px-4 rounded bg-teal hover:bg-teal-dark">Let's Go</button>
            </div>
        </div>
    </div>
</div>


<div class="flex flex-col justify-center items-center">
  <!-- Information Modal -->
	<div class="md:w-1/3 sm:w-full rounded-lg shadow-lg bg-white my-3">
        <div class="flex justify-between border-b border-gray-100 px-5 py-4">
      		<div>
              <i class="fas fa-exclamation-circle text-blue-500"></i>
              <span class="font-bold text-gray-700 text-lg">Information</span>
          	</div>
          <div>
              <button><i class="fa fa-times-circle text-red-500 hover:text-red-600 transition duration-150"></i></button>
          	</div>
      	</div>

      	<div class="px-10 py-5 text-gray-600">
          Lorem ipsum dolor sit amet, consectetur adipi scing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      	</div>

      	<div class="px-5 py-4 flex justify-end">
          <button class="text-sm py-2 px-3 text-gray-500 hover:text-gray-600 transition duration-150">Close</button>
      	</div>
	</div>

  	<!-- Warning Modal -->
	<div class="md:w-1/3 sm:w-full rounded-lg shadow-lg bg-white my-3">
        <div class="flex justify-between border-b border-gray-100 px-5 py-4">
      		<div>
              <i class="fa fa-exclamation-triangle text-orange-500"></i>
              <span class="font-bold text-gray-700 text-lg">Warning</span>
          	</div>
          	<div>
              <button><i class="fa fa-times-circle text-red-500 hover:text-red-600 transition duration-150"></i></button>
          	</div>
      	</div>

      	<div class="px-10 py-5 text-gray-600">
          Lorem ipsum dolor sit amet, consectetur adipi scing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      	</div>

      	<div class="px-5 py-4 flex justify-end">
          <button class="bg-orange-500 mr-1 rounded text-sm py-2 px-3 text-white hover:bg-orange-600 transition duration-150">Cancel</button>
          <button class="text-sm py-2 px-3 text-gray-500 hover:text-gray-600 transition duration-150">OK</button>
      	</div>
	</div>

  	<!-- Error Modal -->
	<div class="md:w-1/3 sm:w-full rounded-lg shadow-lg bg-white my-3">
        <div class="flex justify-between border-b border-gray-100 px-5 py-4">
      		<div>
              <i class="fa fa-exclamation-triangle text-red-500"></i>
              <span class="font-bold text-gray-700 text-lg">Error</span>
          	</div>
          	<div>
              <button><i class="fa fa-times-circle text-red-500 hover:text-red-600 transition duration-150"></i></button>
          	</div>
      	</div>

      	<div class="px-10 py-5 text-gray-600">
          Lorem ipsum dolor sit amet, consectetur adipi scing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      	</div>

      	<div class="px-5 py-4 flex justify-end">
          <button class="text-sm py-2 px-3 text-gray-500 hover:text-gray-600 transition duration-150">OK</button>
      	</div>
	</div>
</div>
