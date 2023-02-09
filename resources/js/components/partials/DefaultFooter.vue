<template>
    <div class="relative pb-0 px-4 sm:px-6 lg:pb-0 lg:px-8">
        <div
            class="relative max-w-7xl mx-auto border-top-solid border-top-4 border-gray-600"
        >
            <div class="bg-white">
                <div
                    class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8"
                >
                    <div class="xl:grid xl:grid-cols-2 xl:gap-8">
                        <div
                            class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2"
                        >
                            <div class="md:grid md:grid-cols-2 md:gap-8">
                                <div>
                                    <h4
                                        class="text-base leading-5 font-semibold tracking-wider text-black-800"
                                    >
                                        Information
                                    </h4>
                                    <ul class="mt-2">
                                        <li>
                                            <a
                                                href="https://www.notre-shop.com/pages/shop-info"
                                                class="text-base leading-4 text-gray-800 hover:text-gray-900"
                                                >Shop Info</a
                                            >
                                        </li>
                                        <li class="mt-2">
                                            <a
                                                href="https://notre.applytojob.com/apply"
                                                class="text-base leading-4 text-gray-800 hover:text-gray-900"
                                                >Careers</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-12 md:mt-0">
                                    <h4
                                        class="text-base leading-5 font-semibold tracking-wider text-black-800"
                                    >
                                        Customer Care
                                    </h4>
                                    <ul class="mt-2">
                                        <li>
                                            <a
                                                href="https://www.notre-shop.com/pages/returns"
                                                class="text-base leading-4 text-gray-800 hover:text-gray-900"
                                                >Returns & Exchanges</a
                                            >
                                        </li>
                                        <li class="mt-2">
                                            <a
                                                href="https://www.notre-shop.com/pages/shipping-rates"
                                                class="text-base leading-4 text-gray-800 hover:text-gray-900"
                                                >Shipping & Rates</a
                                            >
                                        </li>
                                        <li class="mt-2">
                                            <a
                                                href="https://www.notre-shop.com/pages/policies"
                                                class="text-base leading-4 text-gray-800 hover:text-gray-900"
                                                >Policies</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="md:grid md:grid-cols-2 md:gap-8">
                                <div>
                                    <h4
                                        class="text-base leading-5 font-semibold tracking-wider text-black-800"
                                    >
                                        Social
                                    </h4>

                                    <div class="mt-2">
                                        <a
                                            href="https://twitter.com/Notre_Shop"
                                        >
                                            <img
                                                class="h-6 float-left"
                                                :src="
                                                    asset(
                                                        '/images/social/twitter.svg'
                                                    )
                                                "
                                                alt="Twitter Logo"
                                            />
                                        </a>
                                        <a
                                            href="https://www.instagram.com/notre/"
                                        >
                                            <img
                                                class="h-6 ml-2 float-left"
                                                :src="
                                                    asset(
                                                        '/images/social/instagram.svg'
                                                    )
                                                "
                                                alt="Instagram Logo"
                                            />
                                        </a>
                                        <a
                                            href="https://www.facebook.com/notreshop"
                                        >
                                            <img
                                                class="h-6 ml-2 float-left"
                                                :src="
                                                    asset(
                                                        '/images/social/facebook.svg'
                                                    )
                                                "
                                                alt="Facebook Logo"
                                            />
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-12 md:mt-0">
                                    <img
                                        class="h-6"
                                        :src="asset('/images/notre-logo.png')"
                                        alt="Notre Logo"
                                    />
                                    <!--  <img class="block lg:hidden h-6 w-auto" src="/images/logos/notre-logo.png" alt="Notre logo" /> -->
                                    <p
                                        class="mt-2 text-gray-500 text-base leading-6"
                                    >
                                        “There are many ways of doing things
                                        besides your own."
                                    </p>
                                    <p
                                        class="mt-2 text-gray-500 text-sm leading-6"
                                    >
                                        © NOTRE LLC 2020
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="xl:col-span-1">
              <img class="h-10" src="/images/notre-logo.png" alt="Notre Logo" />
              
              <p
                class="mt-8 text-gray-500 text-base leading-6"
              >“There are many ways of doing things besides your own."</p>
              
            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "DefaultFooter"
};
</script>
