<template>
  <Head title="Home" />

  <div class="min-h-screen bg-base-200 dark:bg-gray-900 sm:pt-0">
    <Header :canLogin="$page.props.canLogin" :canRegister="$page.props.canRegister" />

    <div class="hero min-h-screen bg-base-200">
      <div class="flex-col hero-content lg:flex-row-reverse">
        <img
          src="https://images.unsplash.com/photo-1634058844916-c82605c76a9c?ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDYzfHRvd0paRnNrcEdnfHxlbnwwfHx8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
          class="max-w-60 md:max-w-sm rounded-lg shadow-2xl"
        />
        <div class="px-4 md:pr-8 md:inline">
          <h1 class="mb-5 text-5xl font-bold text-center md:text-left">
            Find the perfect freelance services for your business
          </h1>
          <div class="relative w-full md:w-4/6">
            <input
              type="text"
              placeholder="Search"
              class="
                w-full
                pr-16
                input
                bg-primary-content
                text-black
                input-bordered
              "
            />
            <button
              class="absolute top-0 right-0 rounded-l-none btn btn-active"
              role="button"
              aria-pressed="true"
            >
              go
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid bg-base-200 py-10 md:py-5 md:pb-20 px-5 md:px-20">
      <div class="grid grid-cols-12 gap-6">
        <div
          class="col-span-12 md:col-span-4"
          v-for="(gig, i) in $page.props.gigs"
          :key="i"
        >
          <div class="card text-center shadow-2xl">
            <figure class="px-10 pt-10">
              <img :src="gig.featured_image" class="rounded-xl" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">{{ gig.title }}</h2>

              <div class="justify-center card-actions">
                <a
                  class="btn btn-outline btn-white"
                  :href="gig.user.id + '/' + gig.slug"
                >
                  ${{ parseFloat(gig.packages[0].price).toFixed(2) }}
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid bg-base-200 py-8 md:py-5">
      <div class="flex flex-col flex-col-reverse md:flex-row px-4 md:px-20">
        <div class="flex items-center">
          <div>
            <h2 class="text-5xl">
              A whole world of freelance talent at your fingertips
            </h2>
            <br />
            <br />
            <ul class="list-inside list-disc">
              <li class="text-xl py-2">
                Find high-quality services at every price point. No hourly
                rates, just project-based pricing.
              </li>
              <li class="text-xl py-2">
                Find the right freelancer to begin working on your project
                within minutes.
              </li>
              <li class="text-xl py-2">
                Always know what you'll pay upfront. Your payment isn't released
                until you approve the work.
              </li>
              <li class="text-xl py-2">
                Questions? Our round-the-clock support team is available to help
                anytime, anywhere.
              </li>
            </ul>
          </div>
        </div>
        <div class="divider divider-vertical"></div>
        <div>
          <video
            class="rounded-md"
            src="https://roineradrianza-dev-media.s3.us-east-2.amazonaws.com/marketlance/home.mp4"
            loop
            autoplay
          />
        </div>
      </div>
    </div>
  </div>
  <Footer :categories="$page.props.categories" />
</template>

<script>
import { defineComponent } from "vue";
import ApplicationLogo from "@/Jetstream/ApplicationLogoWhite.vue";
import Header from "@/Layouts/Header.vue";
import Footer from "@/Layouts/Footer.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Head,
    Link,
    Header,
    Footer,
  },

  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    gigs: Array,
  },
});
</script>
