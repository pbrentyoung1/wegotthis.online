<template>
  <PageBreadcrumb title="Forum Post" subtitle="Apps" />
  <div class="container">
    <div class="grid grid-cols-1 gap-base lg:grid-cols-4">
      <div class="lg:col-span-3">
        <div class="card">
          <div class="card-body">
            <p class="my-2.5 text-center font-semibold text-default-400 uppercase">#Development Talk</p>
            <h4 class="mb-5 text-center text-xl">What's the best JavaScript framework in {{ currentYear }}?</h4>

            <p class="mb-4">
              With the ever-evolving front-end landscape, JavaScript frameworks are at the heart of most web development stacks. In 2025, options like React, Vue 3, Angular, Svelte, SolidJS, and even newer players continue to battle for dominance in terms of performance,
              developer experience, ecosystem, and community support.
            </p>

            <p class="mb-4">
              React remains a popular choice due to its strong community, wide adoption, and extensive tooling, while Vue 3 continues to grow thanks to its approachable syntax and composition API. On the other hand, Svelte and SolidJS are gaining attention for their compile-time
              optimization and ultra-fast runtime performance.
            </p>

            <p>We'd love to hear your experience: Which framework do you use and why? Are you prioritizing performance, learning curve, community support, or integration capabilities? Share your insights, real-world comparisons, and predictions for the future!</p>

            <div class="mt-7.5 flex flex-wrap justify-between gap-2">
              <div class="flex items-center gap-2.5">
                <img :src="user5" alt="avatar-5" class="size-8 rounded" />
                <div>
                  <a href="#!" class="block font-semibold hover:text-primary">James Milton</a>
                  <span class="text-2xs text-default-400">1 hour ago</span>
                </div>
              </div>

              <span class="flex items-center gap-1.25 text-default-400">
                <Icon icon="messages" />
                <a href="#!" class="hover:text-primary">Answers: 45</a>
              </span>

              <span class="flex items-center gap-1.25 text-default-400">
                <Icon icon="clock" />
                Ends in: 3 days
              </span>

              <span class="flex items-center gap-1.25 text-default-400">
                <Icon icon="users" />
                Votes: 732
              </span>
            </div>

            <div class="my-5 border-b border-dashed border-default-300"></div>

            <div class="mb-5">
              <div class="mb-5">
                <textarea class="form-textarea bg-light/20" id="form-control-textarea" rows="4" placeholder="Enter your messages..."></textarea>
              </div>

              <div class="text-end">
                <button type="submit" class="btn bg-secondary text-white hover:bg-secondary-hover">
                  Submit
                  <Icon icon="send-2" class="text-white" />
                </button>
              </div>
            </div>

            <h4 class="mb-2 text-lg">Replies(15)</h4>
            <div class="my-5 border-b border-dashed border-default-300"></div>

            <div class="mb-2.5 rounded border border-dashed border-default-300 p-5">
              <div class="flex gap-2.5">
                <div class="shrink-0">
                  <img :src="user8" alt="" class="size-8 rounded-full" />
                </div>

                <div>
                  <div>
                    <h5 class="mb-1.25">
                      Liam Carter
                      <small class="text-default-400">15 Apr 2025 · 09:20AM</small>
                    </h5>
                    <p class="mb-2.5">Customers are reporting that the checkout page freezes after submitting their payment information.</p>

                    <a href="#" class="badge bg-light px-1.5 py-1 text-default-400">
                      <Icon icon="corner-up-left" class="text-base" />
                      Reply
                    </a>
                  </div>

                  <div class="mt-7.5 flex gap-2.5">
                    <div class="shrink-0">
                      <img :src="user10" alt="" class="size-8 rounded-full" />
                    </div>

                    <div>
                      <h5 class="mb-1.25">
                        Nina Bryant
                        <small class="text-default-400">15 Apr 2025 · 11:47AM</small>
                      </h5>
                      <p class="mb-2.5">That might be caused by the third-party payment gateway. I recommend testing in incognito mode and checking for any JS errors in the console.</p>

                      <a href="#" class="badge bg-light px-1.5 py-1 text-default-400">
                        <Icon icon="corner-up-left" class="text-base" />
                        Reply
                      </a>
                    </div>
                  </div>

                  <div class="mt-7.5 flex gap-2.5">
                    <div class="shrink-0">
                      <img :src="user3" alt="" class="size-8 rounded-full" />
                    </div>

                    <div>
                      <h5 class="mb-1.25">
                        Sophie Allen
                        <small class="text-default-400">16 Apr 2025 · 10:15AM</small>
                      </h5>
                      <p class="mb-2.5">We’ve noticed this issue before when the CDN cache hasn't been cleared properly. Try purging the cache and reloading the page.</p>

                      <a href="#" class="badge bg-light px-1.5 py-1 text-default-400">
                        <Icon icon="corner-up-left" class="text-base" />
                        Reply
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="mb-2.5 rounded border border-dashed border-default-300 p-5">
              <div class="flex gap-2.5">
                <div class="shrink-0">
                  <img :src="user6" alt="" class="size-8 rounded-full" />
                </div>

                <div>
                  <div>
                    <h5 class="mb-1.25">
                      Daniel West
                      <small class="text-default-400">14 Apr 2025 · 04:15PM</small>
                    </h5>
                    <p class="mb-2.5">You can also clear the browser cache or try a different browser. We had a similar issue with Chrome extensions interfering before.</p>

                    <a href="#" class="badge bg-light px-1.5 py-1 text-default-400">
                      <Icon icon="corner-up-left" class="text-base" />
                      Reply
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="mb-5 rounded border border-dashed border-default-300 p-5">
              <div class="flex gap-2.5">
                <div class="shrink-0">
                  <img :src="user10" alt="" class="size-8 rounded-full" />
                </div>

                <div>
                  <div>
                    <h5 class="mb-1.25">
                      Nina Bryant
                      <small class="text-default-400">16 Apr 2025 · 08:04AM</small>
                    </h5>
                    <p class="mb-4">
                      The
                      <a href="#" class="text-primary underline">System Status Page</a>
                      has been updated. We're actively monitoring and will release a patch within 24 hours.
                    </p>

                    <a href="#" class="badge bg-light px-1.5 py-1 text-default-400">
                      <Icon icon="corner-up-left" class="text-base" />
                      Reply
                    </a>
                  </div>

                  <div class="mt-7.5 flex gap-2.5">
                    <div class="shrink-0">
                      <img :src="user6" alt="" class="size-8 rounded-full" />
                    </div>

                    <div>
                      <h5 class="mb-1.25">
                        Daniel West
                        <small class="text-default-400">16 Apr 2025 · 08:30AM</small>
                      </h5>
                      <p class="mb-2.5">Thanks for the update! We'll notify the customers and let them know the issue is being resolved.</p>

                      <a href="#" class="badge bg-light px-1.5 py-1 text-default-400">
                        <Icon icon="corner-up-left" class="text-base" />
                        Reply
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <nav class="flex items-center justify-center gap-1.5" aria-label="Pagination">
              <button type="button" class="btn btn-icon gap-x-1.5 rounded-full border border-default-300 transition-all duration-300 hover:bg-default-100 hover:text-primary">
                <Icon icon="chevron-left" />
              </button>
              <button type="button" class="btn btn-icon rounded-full border border-default-300 transition-all duration-300 hover:bg-default-100 hover:text-primary">1</button>
              <button type="button" class="btn btn-icon rounded-full bg-primary text-white">2</button>
              <button type="button" class="btn btn-icon rounded-full border border-default-300 transition-all duration-300 hover:bg-default-100 hover:text-primary">3</button>
              <button type="button" class="btn btn-icon rounded-full border border-default-300 transition-all duration-300 hover:bg-default-100 hover:text-primary">4</button>
              <button type="button" class="btn btn-icon rounded-full border border-default-300 transition-all duration-300 hover:bg-default-100 hover:text-primary">5</button>
              <button type="button" class="btn btn-icon gap-x-1.5 rounded-full border border-default-300 transition-all duration-300 hover:bg-default-100 hover:text-primary">
                <Icon icon="chevron-right" />
              </button>
            </nav>
          </div>
        </div>
      </div>

      <div class="col-span-1">
        <button class="btn btn-lg mb-5 w-full bg-primary text-base text-white hover:bg-primary-hover">Ask Question</button>

        <div class="card">
          <div class="card-body border-b border-dashed border-default-300">
            <h5 class="mb-5 font-bold uppercase">Search</h5>

            <div class="input-icon-group">
              <Icon icon="search" class="input-icon" />
              <input type="search" placeholder="Search issues..." class="form-input bg-light/20" />
            </div>
          </div>

          <div class="card-body border-b border-dashed border-default-300">
            <h5 class="mb-5 font-bold uppercase">Category:</h5>
            <ul class="text-sm">
              <li class="border-b border-default-300 py-3">
                <a href="#" class="transition-colors hover:text-primary">Development Talk</a>
              </li>
              <li class="border-b border-default-300 py-3">
                <a href="#" class="transition-colors hover:text-primary">AI & Ethics</a>
              </li>
              <li class="border-b border-default-300 py-3">
                <a href="#" class="transition-colors hover:text-primary">Product Design</a>
              </li>
              <li class="border-b border-default-300 py-3">
                <a href="#" class="transition-colors hover:text-primary">Career Growth</a>
              </li>
              <li class="py-3">
                <a href="#" class="transition-colors hover:text-primary">Open Source</a>
              </li>
            </ul>
          </div>

          <div class="card-body border-b border-dashed border-default-300">
            <h5 class="mb-5 font-bold uppercase">Popular Questions:</h5>

            <ul class="text-sm">
              <li class="border-b border-default-300 py-3">
                <RouterLink to="" class="transition-colors hover:text-primary"> Unlocking the Secrets of Modern UI Design </RouterLink>
              </li>
              <li class="border-b border-default-300 py-3">
                <RouterLink to="" class="transition-colors hover:text-primary"> How to Build a Portfolio with Tailwind CSS </RouterLink>
              </li>
              <li class="border-b border-default-300 py-3">
                <RouterLink to="" class="transition-colors hover:text-primary"> Boost Productivity with These Web Dev Tools </RouterLink>
              </li>
              <li class="border-b border-default-300 py-3">
                <RouterLink to="" class="transition-colors hover:text-primary"> The Future of Frontend: Trends to Watch in 2025 </RouterLink>
              </li>
              <li class="py-3">
                <RouterLink to="" class="transition-colors hover:text-primary"> Essential Tips for Clean and Maintainable Code </RouterLink>
              </li>
            </ul>
          </div>

          <div class="card-body">
            <h5 class="mb-5 font-bold uppercase">Popular Tags:</h5>

            <div class="flex flex-wrap items-center gap-1.5">
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">Web Design</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">Frontend</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">Tailwind CSS</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">JavaScript</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">React</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">Startup</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">DevTools</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">Open Source</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">Performance</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">UX/UI</a>
              <a href="#" class="btn btn-sm bg-light transition-colors hover:text-primary">SEO</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { currentYear } from '~/config/constants'
import user10 from '/images/users/user-10.jpg'
import user3 from '/images/users/user-3.jpg'
import user5 from '/images/users/user-5.jpg'
import user6 from '/images/users/user-6.jpg'
import user8 from '/images/users/user-8.jpg'
</script>
