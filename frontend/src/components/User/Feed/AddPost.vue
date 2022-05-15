<template>
  <div class="modal">
    <div class="modal-box w-11/12 max-w-5xl relative">
      <label
        for="my-modal-3"
        class="
          btn btn-sm
          border-none
          btn-circle
          bg-primary-btn
          hover:bg-secondary-brn
          absolute
          right-2
          top-2
        "
        >✕</label
      >
      <form class="bg-white mb-6 p-4">
        <div class="my-6">
          <label
            class="
              block
              uppercase
              tracking-wide
              text-gray-700 text-xs
              font-bold
              mb-2
            "
            for="grid-last-name"
          >
            Title
          </label>
          <input
            type="text"
            placeholder="Joe"
            class="
              w-full
              rounded-lg
              p-2
              text-sm
              bg-gray-100
              border border-transparent
              appearance-none
              rounded-tg
              placeholder-gray-400
            "
          />
        </div>
        <textarea
          name="message"
          placeholder="Type something..."
          class="
            w-full
            rounded-lg
            p-2
            text-sm
            bg-gray-100
            border border-transparent
            appearance-none
            rounded-tg
            placeholder-gray-400
          "
        ></textarea>
        <footer class="flex justify-between mt-2">
          <div class="flex gap-2">
            <span
              class="
                flex
                items-center
                transition
                ease-out
                duration-300
                hover:bg-secondary-brn hover:text-white
                bg-primary-btn
                w-8
                h-8
                px-2
                rounded-full
                text-blue-100
                cursor-pointer
              "
            >
              <svg
                viewBox="0 0 24 24"
                width="24"
                height="24"
                stroke="currentColor"
                stroke-width="2"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="css-i6dzq1"
              >
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                <polyline points="21 15 16 10 5 21"></polyline>
              </svg>
            </span>
          </div>
          <button
            class="
              flex
              items-center
              py-2
              px-4
              rounded-lg
              text-sm
              bg-primary-btn
              hover:bg-secondary-brn
              text-white
              shadow-lg
            "
          >
            Send
            <svg
              class="ml-1"
              viewBox="0 0 24 24"
              width="16"
              height="16"
              stroke="currentColor"
              stroke-width="2"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <line x1="22" y1="2" x2="11" y2="13"></line>
              <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
            </svg>
          </button>
        </footer>
      </form>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>