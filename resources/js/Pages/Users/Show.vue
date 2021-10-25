<template>
  <Head :title="user.name" />

  <div
    class="
      min-h-screen
      bg-base-200
      dark:bg-gray-900
      sm:pt-0
      flex
      justify-center
    "
  >
    <Header
      :canLogin="$page.props.canLogin"
      :canRegister="$page.props.canRegister"
    />

    <div class="container bg-base-200 pt-20 md:pb-20 px-5 md:px-20">
      <div class="grid grid-cols-12 gap-12 pt-10">
        <div class="col-span-12 md:col-span-4">
          <div class="card shadow-2xl py-10 px-6">
            <div class="avatar flex justify-center">
              <div class="mb-8 rounded-full w-44 h-44">
                <img
                  src="http://daisyui.com/tailwind-css-component-profile-1@94w.png"
                />
              </div>
            </div>
            <h3 class="text-2xl text-center">{{ user.name }}</h3>
            <div class="flex flex-row justify-center">
              <StarIcon class="h-5 w-5" v-for="i in 5" :key="i" />
              5 (180)
            </div>
            <button class="btn btn-outline mt-4 block">Contact me</button>
            <div class="divider"></div>
          </div>
          <div class="card shadow-2xl py-10 px-6 mt-20">
            <Bio />
          </div>
        </div>
        <div class="col-span-12 md:col-span-8">
          <div class="card shadow-2xl">
            <div class="grid grid-cols-12 gap-6 py-5 px-10">
              <div class="col-span-12">
                <h2 class="card-title">{{ user.name }}'s Gigs</h2>
              </div>
              <div class="col-span-4" v-for="(gig, i) in gigs" :key="i">
                <Gig :gig="gig" />
              </div>
            </div>
            <div class="grid grid-cols-12 gap-6 py-5 px-10">
              <div class="col-span-12">
                <h2 class="card-title">Reviews as Seller</h2>
              </div>
              <div class="col-span-12">
                <Reviews :ratings="ratings"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <Footer />
</template>

<script>
import { defineComponent } from "vue";
import Header from "@/Layouts/Header.vue";
import Footer from "@/Layouts/Footer.vue";
import Sidebar from "@/Pages/Users/Parts/Sidebar.vue";
import Bio from "@/Pages/Users/Parts/Bio.vue";
import Reviews from "@/Pages/Users/Parts/Bio.vue";
import Gig from "@/Pages/Users/Parts/Gig.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { StarIcon } from "@heroicons/vue/solid";

export default defineComponent({
  components: {
    Head,
    Link,
    Header,
    Footer,
    Sidebar,
    Reviews,
    Gig,
    Bio,
    StarIcon,
  },

  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    user: Object,
    gig: Array,
    ratings: Array,
  },
});
</script>
