<template>
  <!-- <div class="w-64 h-full bg-gray-800 text-white fixed">
    <div class="p-4">
      <h2 class="text-2xl font-semibold">Menu</h2>
    </div>
    <nav class="mt-4">
      <ul>
        <li class="p-4 hover:bg-gray-700">
          <Link href="/dashboard">Dashboard</Link>
        </li>
        <li class="p-4 hover:bg-gray-700">
          <Link href="/chatbot">AI Chatbot</Link>
        </li>
      </ul>
    </nav>
  </div> -->
  <div style="min-height: 716px"
    class="w-64 fixed top-0 left-0 sm:relative bg-[#0C3190] shadow md:h-full flex-col justify-between hidden sm:flex">
    <div class="px-8">
      <img src="/images/bpkp-logo.png" alt="Logo" class="w-32 mx-auto mt-4" />
      <p class="text-xl text-gray-100 font-semibold mt-8">{{ $page.props.auth.user.name }}</p>
      <ul class="mt-10">
        <li class="flex w-full justify-between text-gray-100 cursor-pointer items-center mb-6">
          <!-- <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
            <span class="text-sm ml-2">Dashboard</span>
          </a> -->
          <Link href="/dashboard">Dashboard</Link>
        </li>
        <li class="flex w-full justify-between text-gray-100 cursor-pointer items-center mb-6">
          <Link href="/chatbot">AI Chatbot</Link>
        </li>
      </ul>
    </div>
  </div>
  <div
    class="w-64 z-40 fixed top-0 left-0 bg-gray-800 shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out"
    id="mobile-nav">
    <button aria-label="toggle sidebar" id="openSideBar"
      class="h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800"
      onclick="sidebarHandler(true)">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="20" height="20"
        viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" />
        <circle cx="6" cy="10" r="2" />
        <line x1="6" y1="4" x2="6" y2="8" />
        <line x1="6" y1="12" x2="6" y2="20" />
        <circle cx="12" cy="16" r="2" />
        <line x1="12" y1="4" x2="12" y2="14" />
        <line x1="12" y1="18" x2="12" y2="20" />
        <circle cx="18" cy="7" r="2" />
        <line x1="18" y1="4" x2="18" y2="5" />
        <line x1="18" y1="9" x2="18" y2="20" />
      </svg>
    </button>
    <button aria-label="Close sidebar" id="closeSideBar"
      class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white"
      onclick="sidebarHandler(false)">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20"
        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" />
        <line x1="18" y1="6" x2="6" y2="18" />
        <line x1="6" y1="6" x2="18" y2="18" />
      </svg>
    </button>
    <div class="px-8">
      <div class="h-16 w-full flex items-center">
        <img src="/images/bpkp-logo.png" alt="Logo" class="w-32 mx-auto mt-4" />
      </div>
      <ul class="mt-12">
        <li class="flex w-full justify-between text-gray-100 hover:text-gray-500 cursor-pointer items-center mb-6">
          <Link href="/dashboard">Dashboard</Link>
        </li>
        <li class="flex w-full justify-between text-gray-100 hover:text-gray-500 cursor-pointer items-center mb-6">
          <Link href="/chatbot">AI Chatbot</Link>
        </li>
      </ul>
      <div class="flex justify-center mt-48 mb-4 w-full">
        <div class="relative">
          <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="16" height="16"
              viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
              stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z"></path>
              <circle cx="10" cy="10" r="7"></circle>
              <line x1="21" y1="21" x2="15" y2="15"></line>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
/* Add any additional styling here */
</style>