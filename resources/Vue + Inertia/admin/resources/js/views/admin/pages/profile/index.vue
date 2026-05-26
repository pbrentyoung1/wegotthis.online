<template>
  <BRow>
    <BCol cols="12">
      <UserCard />
    </BCol>
  </BRow>

  <BRow>
    <BCol xl="4">
      <PersonalInformation />
      <Skills />
      <SocialFeed />
    </BCol>

    <BCol xl="8">
      <BRow class="row-cols-xxl-4 row-cols-md-2 row-cols-1 align-items-center">
        <div v-for="(item, index) in statisticsData" :key="index" class="col">
          <StatisticsCard :item="item" />
        </div>
      </BRow>

      <About />

      <Tasks />

      <h4 class="my-4">My Blog Posts</h4>

      <BRow>
        <BCol xl="4" md="6" v-for="(blog, index) in blogData" :key="index">
          <BlogPost :blog="blog" />
        </BCol>
      </BRow>
    </BCol>
  </BRow>
</template>

<script setup>
import About from './components/About.vue'
import BlogPost from './components/BlogPost.vue'
import { blogData, statisticsData } from './components/data'
import PersonalInformation from './components/PersonalInformation.vue'
import Skills from './components/Skills.vue'
import SocialFeed from './components/SocialFeed.vue'
import StatisticsCard from './components/StatisticsCard.vue'
import Tasks from './components/Tasks.vue'
import UserCard from './components/UserCard.vue'

</script>
