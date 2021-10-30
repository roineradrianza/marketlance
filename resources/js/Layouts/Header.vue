<template>
  <div
    class="
      fixed
      inset-x-0
      top-0
      px-6
      py-4
      sm:block
      container-fluid
      bg-base-200
      z-10
    "
  >
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-2 flex justify-center">
        <Link :href="route('home')" class="text-sm text-white underline">
          <application-logo />
        </Link>
      </div>
      <div class="col-span-9 flex justify-end items-center">
        <template v-if="$page.props.canLogin">
          <template v-if="$page.props.user">
            <Link
              :href="route('dashboard')"
              class="text-sm text-white underline"
            >
              Dashboard
            </Link>
            <form @submit.prevent="logout">
              <jet-dropdown-link as="button"> Log Out </jet-dropdown-link>
            </form>
          </template>

          <template v-else>
            <Link :href="route('login')" class="text-sm text-white underline">
              Log in
            </Link>

            <Link
              v-if="$page.props.canRegister"
              :href="route('register')"
              class="ml-4 text-sm text-white underline"
            >
              Register
            </Link>
          </template>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import ApplicationLogo from "@/Jetstream/ApplicationLogoWhite.vue";
import JetDropdownLink from "@/Jetstream/DropdownLink.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Link,
    JetDropdownLink,
    ApplicationLogo,
  },

  props: {
    canLogin: Boolean,
    canRegister: Boolean,
  },
  methods: {
    logout() {
      this.$inertia.post(route("logout"));
    },
  },
});
</script>