<template>
  <app-layout>
    <div class="py-12 bg-white">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div>
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
              <div>
                <jet-application-logo class="block h-12 w-auto" />
              </div>

              <div class="mt-8 text-2xl">Welcome to Arcus!</div>

              <div class="mt-6 text-gray-500">
                Arcus is a simple video chat platform build to demonstrate use of Agora SDKs.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";
import Welcome from "@/Jetstream/Welcome";

export default {
  components: {
    AppLayout,
    JetApplicationLogo,
    Welcome,
  },
};
</script>