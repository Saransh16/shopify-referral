<template>
    <div
        class="fixed inset-x-0"
        :class="
            position == 'top' ? 'top-0 pt-2 sm:pt-5' : 'bottom-0 pb-2 sm:pb-5'
        "
        v-show="show"
    >
        <div class="w-full lg:w-1/2 mx-auto px-2 sm:px-6 lg:px-8">
            <div class="p-2 rounded-lg bg-gray-600 shadow-lg sm:p-3">
                <div class="flex items-center justify-between flex-wrap">
                    <div class="w-0 flex-1 flex items-center">
                        <span
                            class="hidden sm:flex p-2 rounded-lg bg-indigo-800"
                        >
                            <svg
                                class="h-6 w-6 text-white"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"
                                />
                            </svg>
                        </span>
                        <p class="ml-3 font-medium text-white">
                            <span>{{ message }}</span>
                        </p>
                    </div>
                    <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-2">
                        <button
                            type="button"
                            @click="close()"
                            class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 transition ease-in-out duration-150"
                            aria-label="Dismiss"
                        >
                            <svg
                                class="h-6 w-6 text-white"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Toast",
    props: {
        show: Boolean,
        message: String,
        position: {
            type: String,
            default: "bottom"
        }
    },
    methods: {
        close() {
            this.$emit("toast-close");
        }
    }
};
</script>
