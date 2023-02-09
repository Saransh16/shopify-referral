<template>
  <div class="flex flex-col w-full flex-1 overflow-hidden">
    <main
      class="flex-1 relative z-0 overflow-y-auto pt-2 pb-6 focus:outline-none md:py-6"
      tabindex="0"
    >
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">
          Dashboard
        </h1>
      </div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <!-- Replace with your content -->
        <div>
          <!-- <h3 class="text-lg leading-6 font-medium text-gray-900">
        Last 30 days
      </h3>-->
          <div
            class="font-mono tracking-tight mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3"
          >
            <div
              class="bg-gray-50 overflow-hidden shadow rounded-lg"
            >
              <div class="px-4 py-5 sm:p-6">
                <dl>
                  <dt
                    class="text-sm leading-5 font-medium text-gray-500 truncate"
                  >
                    Total Subscribers
                  </dt>
                  <dd
                    class="mt-1 text-3xl leading-9 font-semibold text-gray-900"
                  >
                    71,897
                  </dd>
                </dl>
              </div>
            </div>
            <div
              class="bg-gray-50 overflow-hidden shadow rounded-lg"
            >
              <div class="px-4 py-5 sm:p-6">
                <dl>
                  <dt
                    class="text-sm leading-5 font-medium text-gray-500 truncate"
                  >
                    Avg. Open Rate
                  </dt>
                  <dd
                    class="mt-1 text-3xl leading-9 font-semibold text-gray-900"
                  >
                    58.16%
                  </dd>
                </dl>
              </div>
            </div>
            <div
              class="bg-gray-50 overflow-hidden shadow rounded-lg"
            >
              <div class="px-4 py-5 sm:p-6">
                <dl>
                  <dt
                    class="text-sm leading-5 font-medium text-gray-500 truncate"
                  >
                    Avg. Click Rate
                  </dt>
                  <dd
                    class="mt-1 text-3xl leading-9 font-semibold text-gray-900"
                  >
                    24.57%
                  </dd>
                </dl>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-20 relative bg-gray-800">
          <div
            class="h-56 bg-green-400 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2"
          >
            <!-- <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&blend=6875F5&sat=-100&blend-mode=multiply" alt="Support team" /> -->
          </div>
          <div
            class="relative max-w-screen-xl mx-auto px-4 py-12 sm:px-6 lg:px-8 lg:py-16"
          >
            <div class="md:ml-auto md:w-1/2 md:pl-10">
              <!-- <div class="text-base leading-6 font-semibold uppercase tracking-wider text-gray-300">
          Award winning support
        </div>-->
              <h2
                class="mt-2 text-white text-3xl leading-9 font-extrabold tracking-tight sm:text-4xl sm:leading-10"
              >
                Lorem ipsum dolar.
              </h2>
              <p
                class="font-mono tracking-tight mt-3 text-lg leading-7 text-gray-300"
              >
                Lorem ipsum dolor sit amet, consectetur
                adipiscing elit. Et, egestas tempus tellus etiam
                sed. Quam a scelerisque amet ullamcorper eu enim
                et fermentum, augue. Aliquet amet volutpat
                quisque ut interdum tincidunt duis.
              </p>
              <div class="mt-8">
                <!-- <div class="inline-flex rounded-md shadow">
          <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-gray-900 bg-white hover:text-gray-600 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
            Visit the help center
            <svg class="-mr-1 ml-3 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5zM5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" clip-rule="evenodd"/>
            </svg>
          </a>
        </div>-->
              </div>
            </div>
          </div>
        </div>

        <!-- /End replace -->
      </div>
    </main>
  </div>
</template>

<script>
export default {
  name: "AdminDashboard",
  // beforeMount()
  // {
  //   if(!window.auth_user) window.location.href = "/login";
  // }
};
</script>
