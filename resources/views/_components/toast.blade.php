<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div x-data="noticesHandler()" @notice.window="add($event.detail)">

        <div class="absolute right-0 top-0 m-5 w-1/2 xl:w-1/5 lg:w-1/4 md:w-2/5 sm:w-1/2" >
            <template x-for="notice of notices" :key="notice.id">
                <div
                    x-show="visible.includes(notice)"
                    x-transition:enter="transition ease-in duration-200"
                    x-transition:enter-start="transform opacity-0 translate-y-2"
                    x-transition:enter-end="transform opacity-100"
                    x-transition:leave="transition ease-out duration-500"
                    x-transition:leave-start="transform translate-x-0 opacity-100"
                    x-transition:leave-end="transform translate-x-full opacity-0"
                    @click="remove(notice.id)"
                    class="py-2 px-3 shadow-md mb-2 border-r-4 grid grid-cols-4"
                    :class="{
                    'bg-green-500 border-green-700': notice.type === 'success',
                    'bg-blue-400 border-blue-700': notice.type === 'info',
                    'bg-orange-400 border-orange-700': notice.type === 'warning',
                    'bg-red-500 border-red-700': notice.type === 'danger',
                    }"
                    style="pointer-events:all">

                    <div class="col-start-1 col-span-3"> <div class="text-white text-right"><span x-text="notice.text"></span></div> </div>

                    <div class="col-start-4 col-span-1" x-html="getIcon(notice)"></div>

                </div>
            </template>
        </div>

    </div>


    <div class="flex items-center justify-center h-screen w-screen">
        <button x-data="{}"
                @click="$dispatch('notice', {type: 'success', text: 'آلرت ساکسس'})"
                class="m-4 bg-green-500 text-lg font-bold p-6 py-2 text-white shadow-md rounded">
            Success
        </button>
        <button x-data="{}"
                @click="$dispatch('notice', {type: 'info', text: 'آلرت اینفو'})"
                class="m-4 bg-blue-500 text-lg font-bold p-6 py-2 text-white shadow-md rounded">
            Info
        </button>
        <button x-data="{}"
                @click="$dispatch('notice', {type: 'warning', text: 'آلرت وارنینگ'})"
                class="m-4 bg-orange-500 text-lg font-bold p-6 py-2 text-white shadow-md rounded">
            Warning
        </button>
        <button x-data="{}"
                x-on:click="$dispatch('notice', {type: 'danger', text: 'آلرت دنجر'})"
                class="m-4 bg-red-500 text-lg font-bold p-6 py-2 text-white shadow-md rounded">
            Danger
        </button>
    </div>

    <script>
        function noticesHandler() {
            return {
                notices: [],
                visible: [],
                add(notice) {
                    notice.id = Date.now()
                    this.notices.push(notice)
                    this.fire(notice.id)
                },
                fire(id) {
                    this.visible.push(this.notices.find(notice => notice.id == id))
                    const timeShown = 2000 * this.visible.length
                    setTimeout(() => {
                        this.remove(id)
                    }, timeShown)
                },
                remove(id) {
                    const notice = this.visible.find(notice => notice.id == id)
                    const index = this.visible.indexOf(notice)
                    this.visible.splice(index, 1)
                },
                getIcon(notice){
                    if ( notice.type == 'success')
                        return "<div class='text-green-500 rounded-full bg-white float-left' ><svg width='1.8em' height='1.8em' viewBox='0 0 16 16' class='bi bi-check' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z'/></svg></div>" ;
                    else if ( notice.type == 'info')
                        return  "<div class='text-blue-500 rounded-full bg-white float-left'><svg width='1.8em' height='1.8em' viewBox='0 0 16 16' class='bi bi-info' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path d='M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z'/><circle cx='8' cy='4.5' r='1'/></svg></div>" ;
                    else if ( notice.type == 'warning')
                        return  "<div class='text-orange-500 rounded-full bg-white float-left'><svg width='1.8em' height='1.8em' viewBox='0 0 16 16' class='bi bi-exclamation' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path d='M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z'/></svg></div>" ;
                    else if ( notice.type == 'danger')
                        return  "<div class='text-red-500 rounded-full bg-white float-left'><svg width='1.8em' height='1.8em' viewBox='0 0 16 16' class='bi bi-x' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z'/><path fill-rule='evenodd' d='M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z'/></svg></div>" ;
                }
            };
        }
    </script>
