    <div
        class="my-12"
        x-data="{ width: '50' }"
        x-init="$watch('width', value => { if (value > 100) { width = 100 } if (value == 0) { width = 10 } })"
        >

        <!-- Light mode -->
        <div class="p-10 max-w-full bg-white shadow rounded">
            <!-- Start Light version -->
            <div
                class="bg-gray-200 rounded h-1"
                role="progressbar"
                :aria-valuenow="width"
                aria-valuemin="0"
                aria-valuemax="100"
                >
                <div
                    class="bg-green-400 rounded h-1 text-center"
                    :style="`width: ${width}%; transition: width 2s;`"
                    >
                </div>
            </div>
            <!-- End Light version -->

            <!-- Start Regular version -->
            <div
                class="bg-gray-200 rounded h-4 mt-5"
                role="progressbar"
                :aria-valuenow="width"
                aria-valuemin="0"
                aria-valuemax="100"
                >
                <div
                    class="bg-green-400 rounded h-4 text-center"
                    :style="`width: ${width}%; transition: width 2s;`"
                    >
                </div>
            </div>
            <!-- End Regular version -->

            <!-- Start Regular with text version -->
            <div
                class="bg-gray-200 rounded h-6 mt-5"
                role="progressbar"
                :aria-valuenow="width"
                aria-valuemin="0"
                aria-valuemax="100"
                >
                <div
                    class="bg-green-400 rounded h-6 text-center text-white text-sm transition"
                    :style="`width: ${width}%; transition: width 2s;`"
                    x-text="`${width}%`"
                    >
                </div>
            </div>
            <!-- End Regular with text version -->
        </div>

        <!-- Dark mode -->
        <div class="p-10 my-10 max-w-full bg-gray-800 shadow rounded">
            <!-- Start Light version -->
            <div
                class="bg-gray-900 rounded h-1"
                role="progressbar"
                :aria-valuenow="width"
                aria-valuemin="0"
                aria-valuemax="100"
                >
                <div
                    class="bg-blue-800 rounded h-1 text-center"
                    :style="`width: ${width}%; transition: width 2s;`"
                    >
                </div>
            </div>
            <!-- End Light version -->

            <!-- Start Regular version -->
            <div
                class="bg-gray-900 rounded h-4 mt-5"
                role="progressbar"
                :aria-valuenow="width"
                aria-valuemin="0"
                aria-valuemax="100"
                >
                <div
                    class="bg-blue-800 rounded h-4 text-center"
                    :style="`width: ${width}%; transition: width 2s;`"
                    >
                </div>
            </div>
            <!-- End Regular version -->

            <!-- Start Regular with text version -->
            <div
                class="bg-gray-900 rounded h-6 mt-5"
                role="progressbar"
                :aria-valuenow="width"
                aria-valuemin="0"
                aria-valuemax="100"
                >
                <div
                    class="bg-blue-800 rounded h-6 text-center text-white text-sm transition"
                    :style="`width: ${width}%; transition: width 2s;`"
                    x-text="`${width}%`"
                    >
                </div>
            </div>
            <!-- End Regular with text version -->
        </div>

        <div class="mt-10">
            Type a value
            <input
                   class="border border-gray-500 rounded"
                   type="number"
                   class="form-input"
                   x-model="width"
                   min="1"
                   max="100"
                   >
        </div>
    </div>
