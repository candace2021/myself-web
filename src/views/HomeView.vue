<script setup>
import ContactMe from '../components/ContactMe.vue'
import AboutMe from '../components/IntroductionMe.vue'
import PortfolioList from '../components/PortfolioList.vue'
import TechnicalSkills from '../components/TechnicalSkills.vue'
import WorkExperience from '../components/WorkExperience.vue'
</script>

<template>
  <main>
    <section class="home" id="home">
      <div class="img">
        <img src="@/assets/images/img-1.jpg" />
      </div>
      <div class="im-box">
        <h1 class="im-word">I'm Candace <br />a Front-End Engineer</h1>
        <ul class="tags">
          <li># HTML</li>
          <li># CSS</li>
          <li># SCSS</li>
          <li># JQUERY</li>
          <li># JAVASCRIPT</li>
          <li># VUE</li>
          <li># VITE</li>
          <li># ROUTER</li>
          <li># PINIA</li>
          <li># ELEMENT PLUS</li>
          <li># FIGMA</li>
          <li># TYPESCRIPT</li>
          <li># ILLUSTRATOR</li>
          <li># PHOTOSHOP</li>
          <li># SWIPER</li>
          <li># GSAP</li>
          <li># GIT</li>
        </ul>
      </div>
    </section>
    <AboutMe />
    <WorkExperience />
    <TechnicalSkills />
    <PortfolioList />
    <ContactMe />
  </main>
</template>

<style lang="scss">
section {
  position: relative;
  padding: 20px;
}
.home {
  position: relative;
  display: flex;
  align-items: center;
  width: 100%;
  height: 100%;
  min-height: 100vh;
  @include mediaquery(null, 991px) {
    flex-direction: column;
    justify-content: center;
  }
  @include mediaquery(null, 767px) {
    padding-top: 60px;
  }
  .img {
    @include mediaquery(768px, null) {
      padding: 20px;
    }
    @include mediaquery(null, 991px) {
      max-width: 440px;
    }
  }
  .im-box {
    @include mediaquery(1101px, null) {
      flex: 1 0 500px;
      width: 500px;
      padding: 20px;
    }
    @include mediaquery(992px, 1100px) {
      flex: 1 0 360px;
      width: 360px;
      padding: 10px;
    }
    .im-word {
      height: 100%;
      font-size: 46px;
      font-weight: 700;
      text-shadow: 2px 2px 2px $primary-color;
      @include mediaquery(768px, 991px) {
        font-size: 40px;
        text-align: center;
      }
      @include mediaquery(null, 767px) {
        font-size: 32px;
        text-align: center;
      }
    }
    .tags {
      margin: 40px 0;
      @include mediaquery(null, 991px) {
        margin: 20px 0;
        text-align: center;
      }
      li {
        display: inline-block;
        margin: 5px;
        padding: 5px;
        background-color: $primary-color;
        border-radius: 5px;
        @include mediaquery(null, 767px) {
          margin: 3px;
          padding: 3px;
          font-size: 14px;
        }
      }
    }
  }
}
</style>
