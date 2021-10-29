<template>
  <Head :title="user.name" />
  <Layout>
    <div class="flex justify-center">
      <div class="container pt-20 md:pb-20 px-1 md:px-20">
        <div class="grid grid-cols-12 gap-12 md:pt-10">
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
              <div class="grid grid-cols-12">
                <div class="col-span-6 md:col-span-12 lg:col-span-6">
                  Member since
                </div>
                <div
                  class="
                    col-span-6
                    md:col-span-12
                    lg:col-span-6
                    flex
                    justify-end
                  "
                >
                  <b>
                    {{ getFormatDate(user.created_at, "MMM YYYY") }}
                  </b>
                </div>
              </div>
            </div>
            <div class="card shadow-2xl py-10 px-6 mt-20">
              <Bio :user="user" />
            </div>
          </div>
          <div class="col-span-12 md:col-span-8">
            <div class="card shadow-2xl">
              <div class="grid grid-cols-12 gap-6 py-5 px-10">
                <div class="col-span-12">
                  <h2 class="card-title">{{ user.name }}'s Gigs</h2>
                </div>
                <div
                  class="col-span-12 md:col-span-4"
                  v-for="(gig, i) in user.gigs"
                  :key="i"
                >
                  <Gig :gig="gig" />
                </div>
              </div>
              <div class="grid grid-cols-12 gap-6 py-5 px-10">
                <div class="col-span-12">
                  <Reviews
                    :buyer_ratings="user.buyer_ratings"
                    :seller_ratings="user.seller_ratings"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script>
import { defineComponent } from "vue";
import Layout from "@/Layouts/App.vue";
import Header from "@/Layouts/Header.vue";
import Footer from "@/Layouts/Footer.vue";
import Sidebar from "@/Pages/Users/Parts/Sidebar.vue";
import Bio from "@/Pages/Users/Parts/Bio.vue";
import Reviews from "@/Pages/Users/Parts/Reviews.vue";
import Gig from "@/Pages/Users/Parts/Gig.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { StarIcon } from "@heroicons/vue/solid";
import moment from "moment";

export default defineComponent({
  components: {
    Head,
    Link,
    Layout,
    Header,
    Footer,
    Sidebar,
    Reviews,
    Gig,
    Bio,
    StarIcon,
  },

  props: {
    user: Object,
  },

  methods: {
    getFormatDate(d, f) {
      return moment(d).format(f);
    },
  },
});
</script>
