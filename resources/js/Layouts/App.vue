<template>
  <div>
    <Head :title="title" />

    <div class="min-h-screen dark:bg-gray-900 sm:pt-0">
      <Header :canLogin="canLogin" :canRegister="canRegister" />
      <!-- Page Content -->
      <main>
        <slot></slot>
      </main>
      <Footer />
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import Header from "@/Layouts/Header.vue";
import Footer from "@/Layouts/Footer.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  props: {
    title: String,
    canLogin: Boolean,
    canRegister: Boolean,
  },

  components: {
    Head,
    Link,
    Header,
    Footer,
  },

  data() {
    return {
      showingNavigationDropdown: false,
    };
  },

  
});
</script>
