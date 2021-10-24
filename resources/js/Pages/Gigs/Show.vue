<template>
  <Head :title="gig.title" />

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
      <div class="grid grid-cols-12 gap-6 pt-10">
        <div class="col-span-12 md:col-span-7">
          <div class="card text-center shadow-2xl">
            <figure class="px-10 pt-10">
              <img :src="gig.featured_image" class="rounded-xl" />
            </figure>
            <h2 class="card-title text-3xl pt-5">{{ gig.title }}</h2>
            <Author :author="gig.user" :ratings="gig.ratings" />
            <div class="px-10 pb-10">
              <h3 class="card-title text-left text-2xl">About this</h3>
              <p class="text-justify">{{ gig.description }}</p>
            </div>

            <compare-package :packages="gig.packages" />
            <AuthorInfo :author="gig.user" :ratings="gig.ratings" />
          </div>
        </div>
        <div class="col-span-12 md:col-span-5">
          <div class="card text-center shadow-2xl sticky top-0">
            <Sidebar :packages="gig.packages" />
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
import Sidebar from "@/Pages/Gigs/Parts/Sidebar.vue";
import Author from "@/Pages/Gigs/Parts/Author.vue";
import AuthorInfo from "@/Pages/Gigs/Parts/AuthorInfo.vue";
import ComparePackage from "@/Pages/Gigs/Parts/ComparePackage.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { StarIcon } from "@heroicons/vue/solid";

export default defineComponent({
  components: {
    Head,
    Link,
    Header,
    Footer,
    Sidebar,
    Author,
    AuthorInfo,
    ComparePackage,
    StarIcon,
  },

  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    gig: Object,
  },
});
</script>
