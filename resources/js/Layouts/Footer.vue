<template>
  <footer class="p-5 md:p-20 footer  text-base-content">
    <div>
      <application-logo />
      <p>
        MarketLance LLC. <br />Providing reliable freelance services since 2020
      </p>
    </div>
    <div>
      <span class="footer-title">Services</span>
      <a
        class="link link-hover capitalize"
        :href="'category/' + category.slug"
        v-for="(category, i) in $page.props.categories"
        :key="i"
      >
        {{ category.name }}
      </a>
    </div>
    <div>
      <span class="footer-title">Legal</span>
      <a class="link link-hover">Terms of use</a>
      <a class="link link-hover">Privacy policy</a>
      <a class="link link-hover">Cookie policy</a>
    </div>
  </footer>
</template>

<script>
import { defineComponent } from "vue";
import ApplicationLogo from "@/Jetstream/ApplicationMarkWhite.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
    ApplicationLogo
  },
  props: {
    categories: Array,
  },
  created() {
    fetch(route('categories.latest'))
    .then( res => res.json())
    .then( data => this.$page.props.categories = data)
  }
});
</script>