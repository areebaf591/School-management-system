<template>
  <div class="portfolio">
    <!-- NAVBAR -->
    <nav class="navbar" :class="{ 'navbar-scrolled': isScrolled }">
      <div class="nav-container">
        <div class="nav-logo">AF</div>
        <ul class="nav-menu" :class="{ 'nav-menu-active': isMenuOpen }">
          <li class="nav-item">
            <a href="#home" class="nav-link" @click="closeMenu">Home</a>
          </li>
          <li class="nav-item">
            <a href="#about" class="nav-link" @click="closeMenu">About</a>
          </li>
          <li class="nav-item">
            <a href="#skills" class="nav-link" @click="closeMenu">Skills</a>
          </li>
          <li class="nav-item">
            <a href="#projects" class="nav-link" @click="closeMenu">Projects</a>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link" @click="closeMenu">Contact</a>
          </li>
        </ul>
        <div class="nav-toggle" @click="toggleMenu">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </div>
    </nav>

    <!-- HERO -->
    <section class="hero" id="home">
      <div class="hero-bg-animation">
        <div class="floating-shapes">
          <div class="shape shape-1"></div>
          <div class="shape shape-2"></div>
          <div class="shape shape-3"></div>
        </div>
      </div>
      <div class="hero-content">
        <h1 class="hero-title">Areeba Fatima</h1>
        <div class="typing-container">
          <p class="hero-subtitle">Full Stack Web Developer</p>
          <span class="typing-text">{{ displayText }}</span>
          <span class="cursor">|</span>
        </div>
        <div class="hero-buttons">
          <a href="#projects" class="btn primary-btn">View My Work</a>
          <a href="#contact" class="btn secondary-btn">Contact Me</a>
        </div>
      </div>
      <div class="hero-animation">
        <div class="code-block">
          <pre><code>{{ codeSnippet }}</code></pre>
        </div>
      </div>
    </section>

    <!-- ABOUT -->
    <section class="about" id="about">
      <div class="section-bg">
        <div class="bg-pattern"></div>
      </div>
      <div class="section-container">
        <div class="section-header">
          <h2 class="section-title">About Me</h2>
          <div class="section-underline"></div>
        </div>
        <div class="about-container">
          <div class="about-image">
            <div class="image-container">
              <div class="profile-image">
                <img src="https://picsum.photos/seed/hijab-professional-woman/400/400.jpg" alt="Profile">
              </div>
            </div>
          </div>
          <div class="about-content">
            <p>
              I am a Full Stack Web Developer with hands-on experience in Laravel and Vue.js.
              I specialize in building secure, scalable, and role-based web applications with
              clean UI and strong backend logic.
            </p>
            <p>
              My passion lies in creating efficient solutions to complex problems and turning
              ideas into reality through code. I'm constantly learning and adapting to new
              technologies to stay current in this ever-evolving field.
            </p>
            <a href="#contact" class="btn primary-btn">Get In Touch</a>
          </div>
        </div>
      </div>
    </section>

    <!-- SKILLS -->
    <section class="skills" id="skills">
      <div class="section-container">
        <div class="section-header">
          <h2 class="section-title">Skills</h2>
          <div class="section-underline"></div>
        </div>
        <div class="skills-container">
          <div class="skill-category" v-for="(category, index) in skillCategories" :key="index">
            <h3>{{ category.name }}</h3>
            <div class="skill-items">
              <div class="skill-item" v-for="skill in category.skills" :key="skill">
                <div class="skill-icon">{{ getSkillIcon(skill) }}</div>
                <span>{{ skill }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- PROJECTS -->
    <section class="projects" id="projects">
      <div class="section-bg">
        <div class="bg-pattern"></div>
      </div>
      <div class="section-container">
        <div class="section-header">
          <h2 class="section-title">Projects</h2>
          <div class="section-underline"></div>
        </div>
        <div class="projects-container">
          <div class="project-card" v-for="(project, index) in projects" :key="index">
            <div class="project-image">
              <img :src="project.image" :alt="project.title">
            </div>
            <div class="project-content">
              <h3>{{ project.title }}</h3>
              <p>{{ project.description }}</p>
              <div class="project-tech">
                <span v-for="tech in project.technologies" :key="tech">{{ tech }}</span>
              </div>
              <div class="project-links">
                <a href="#" class="project-link">View Project</a>
                <a href="#" class="project-link">View Code</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTACT -->
    <section class="contact" id="contact">
      <div class="section-container">
        <div class="section-header">
          <h2 class="section-title">Contact</h2>
          <div class="section-underline"></div>
        </div>
        <div class="contact-container">
          <div class="contact-info">
            <div class="contact-item">
              <div class="contact-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              </div>
              <div class="contact-details">
                <h3>Email</h3>
                <p>areebaf591@gmail.com</p>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
              </div>
              <div class="contact-details">
                <h3>LinkedIn</h3>
                <a href="https://www.linkedin.com/in/areeba-fatima-1a6b90389/" target="_blank">linkedin.com/in/areebafatima</a>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
              </div>
              <div class="contact-details">
                <h3>GitHub</h3>
                <p>github.com/areebafatima</p>
              </div>
            </div>
          </div>
          <form class="contact-form" @submit.prevent="submitForm">
            <div class="form-group">
              <input type="text" placeholder="Your Name" v-model="form.name" required>
            </div>
            <div class="form-group">
              <input type="email" placeholder="Your Email" v-model="form.email" required>
            </div>
            <div class="form-group">
              <textarea placeholder="Your Message" v-model="form.message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn primary-btn">Send Message</button>
          </form>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <footer>
      <div class="footer-container">
        <p>&copy; 2026 Areeba Fatima. All Rights Reserved.</p>
        <div class="social-links">
          <a href="#" class="social-link">GitHub</a>
          <a href="https://www.linkedin.com/in/areeba-fatima-1a6b90389/" target="_blank" class="social-link">LinkedIn</a>
          <a href="#" class="social-link">Twitter</a>
        </div>
      </div>
    </footer>

    <!-- BACK TO TOP BUTTON -->
    <button class="back-to-top" @click="scrollToTop" v-show="isScrolled">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
    </button>
  </div>
</template>

<script>
export default {
  name: "Portfolio",
  data() {
    return {
      isScrolled: false,
      isMenuOpen: false,
      displayText: "",
      typingIndex: 0,
      typingTexts: ["Laravel & Vue.js", "Full Stack Development", "Web Applications"],
      currentTextIndex: 0,
      codeSnippet: `function createPortfolio() {
  const skills = ['Laravel', 'Vue.js', 'PHP', 'MySQL'];
  const passion = 'Web Development';
  
  return {
    developer: 'Areeba Fatima',
    expertise: skills,
    drivenBy: passion
  };
}`,
      skillCategories: [
        {
          name: "Frontend",
          skills: ["JavaScript", "Vue.js", "HTML5", "CSS3", "Bootstrap", "Tailwind UI", "Vuetify"]
        },
        {
          name: "Backend",
          skills: ["PHP", "Laravel Framework", "Eloquent ORM", "RESTful APIs", "MySQL"]
        },
        {
          name: "Libraries & Tools",
          skills: ["Spatie Laravel", "Laravel Breeze", "Laravel Permission", "Laravel Socialite", "Laravel Excel", "Axios", "Vue Router", "Figma", "Adobe Photoshop", "Repository Pattern", "CRUD Systems", "Middleware", "Soft Deletes"]
        }
      ],
      projects: [
        {
          title: "Hospital Management System",
          description: "Role-based system with Admin, Doctor, Receptionist panels, CRUD operations, authentication, and permissions.",
          technologies: ["Laravel", "Vue.js", "MySQL"],
          image: "https://picsum.photos/seed/hospital-management/600/400.jpg"
        },
        {
          title: "School Management System",
          description: "Comprehensive role-based system with Admin, Teacher, Student, and Parent panels for complete educational institution management.",
          technologies: ["Laravel", "Vue.js", "MySQL"],
          image: "https://picsum.photos/seed/school-management/600/400.jpg"
        },
        {
          title: "Jewelry Shop",
          description: "E-commerce platform for jewelry with role-based access for Admin, Vendors, and Customers with inventory management.",
          technologies: ["Laravel", "Vue.js", "MySQL"],
          image: "https://picsum.photos/seed/jewelry-shop/600/400.jpg"
        },
        {
          title: "User Management System",
          description: "Multi-role system (Admin, Teacher, Student) with permissions, dashboards, and secure access control.",
          technologies: ["Laravel", "Vue.js"],
          image: "https://picsum.photos/seed/user-management/600/400.jpg"
        }
      ],
      form: {
        name: "",
        email: "",
        message: ""
      }
    };
  },
  mounted() {
    window.addEventListener("scroll", this.handleScroll);
    this.typeWriter();
  },
  beforeDestroy() {
    window.removeEventListener("scroll", this.handleScroll);
  },
  methods: {
    handleScroll() {
      this.isScrolled = window.scrollY > 50;
    },
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
    },
    closeMenu() {
      this.isMenuOpen = false;
    },
    scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    },
    typeWriter() {
      const currentText = this.typingTexts[this.currentTextIndex];
      
      if (this.typingIndex < currentText.length) {
        this.displayText += currentText.charAt(this.typingIndex);
        this.typingIndex++;
        setTimeout(this.typeWriter, 100);
      } else {
        setTimeout(() => {
          this.displayText = "";
          this.typingIndex = 0;
          this.currentTextIndex = (this.currentTextIndex + 1) % this.typingTexts.length;
          this.typeWriter();
        }, 2000);
      }
    },
    getSkillIcon(skill) {
      const icons = {
        "JavaScript": "JS",
        "Vue.js": "V",
        "HTML5": "H5",
        "CSS3": "C3",
        "Bootstrap": "B",
        "Tailwind UI": "T",
        "Vuetify": "VU",
        "PHP": "P",
        "Laravel Framework": "L",
        "Eloquent ORM": "EO",
        "RESTful APIs": "API",
        "MySQL": "M",
        "Spatie Laravel": "SL",
        "Laravel Breeze": "LB",
        "Laravel Permission": "LP",
        "Laravel Socialite": "LS",
        "Laravel Excel": "LE",
        "Axios": "AX",
        "Vue Router": "VR",
        "Figma": "F",
        "Adobe Photoshop": "PS",
        "Repository Pattern": "RP",
        "CRUD Systems": "CS",
        "Middleware": "MW",
        "Soft Deletes": "SD"
      };
      return icons[skill] || skill.substring(0, 2);
    },
    submitForm() {
      // Form submission logic would go here
      alert("Thank you for your message! I'll get back to you soon.");
      this.form = {
        name: "",
        email: "",
        message: ""
      };
    }
  }
};
</script>

<style scoped>
html, body {
  margin: 0;
  padding: 0;
  width: 100%;
  overflow-x: hidden; /* Prevent horizontal scroll */
}
/* GLOBAL */
.portfolio {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #1f2933;
  background: #f9fafb;
  overflow-x: hidden;
  margin: 0;
  padding: 0;
  width: 100%;
  box-sizing: border-box;
  
}

* {
  box-sizing: border-box;
}

/* NAVBAR */
.navbar {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  padding: 15px 0;
  z-index: 1000;
  transition: all 0.3s ease;
  background: transparent;
}

.navbar-scrolled {
  background: rgba(17, 24, 39, 0.95);
  backdrop-filter: blur(10px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.nav-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  margin: 0 auto;
  padding: 0 5%;
}

.nav-logo {
  font-size: 1.8rem;
  font-weight: 700;
  color: white;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  width: 45px;
  height: 45px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.nav-menu {
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
}

.nav-item {
  margin-left: 30px;
}

.nav-link {
  color: white;
  text-decoration: none;
  font-weight: 500;
  position: relative;
  transition: color 0.3s ease;
}

.nav-link::after {
  content: '';
  position: absolute;
  bottom: -5px;
  left: 0;
  width: 0;
  height: 2px;
  background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
  transition: width 0.3s ease;
}

.nav-link:hover::after {
  width: 100%;
}

.nav-toggle {
  display: none;
  flex-direction: column;
  cursor: pointer;
}

.bar {
  width: 25px;
  height: 3px;
  background: white;
  margin: 3px 0;
  transition: 0.3s;
}

/* HERO */
.hero {
  min-height: 100vh;
  background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
  color: white;
  display: flex;
  align-items: center;
  padding: 0 5%;
  position: relative;
  overflow: hidden;
  width: 100%;
  margin: 0;
}

.hero-bg-animation {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}

.floating-shapes {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.shape {
  position: absolute;
  opacity: 0.1;
}

.shape-1 {
  width: 300px;
  height: 300px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border-radius: 50%;
  top: 10%;
  left: 10%;
  animation: float 20s infinite ease-in-out;
}

.shape-2 {
  width: 200px;
  height: 200px;
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
  bottom: 10%;
  right: 15%;
  animation: float 15s infinite ease-in-out reverse;
}

.shape-3 {
  width: 150px;
  height: 150px;
  background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
  border-radius: 50%;
  top: 50%;
  right: 10%;
  animation: float 25s infinite ease-in-out;
}

.hero-content {
  max-width: 600px;
  z-index: 2;
  position: relative;
}

.hero-title {
  font-size: 3.5rem;
  margin-bottom: 20px;
  animation: fadeInUp 1s ease;
  background: linear-gradient(90deg, #fff, #a8edea);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
}

.typing-container {
  display: flex;
  align-items: center;
  margin-bottom: 30px;
  font-size: 1.4rem;
  height: 40px;
}

.hero-subtitle {
  margin-right: 10px;
}

.typing-text {
  color: #a8edea;
}

.cursor {
  animation: blink 1s infinite;
  color: #a8edea;
}

.hero-buttons {
  display: flex;
  gap: 20px;
  animation: fadeInUp 1s ease 0.2s both;
}

.hero-animation {
  position: absolute;
  right: 5%;
  top: 50%;
  transform: translateY(-50%);
  width: 40%;
  max-width: 500px;
  opacity: 0.8;
  animation: float 6s ease-in-out infinite;
  z-index: 2;
}

.code-block {
  background: rgba(0, 0, 0, 0.3);
  border-radius: 10px;
  padding: 20px;
  font-family: 'Courier New', monospace;
  font-size: 0.9rem;
  color: #a8edea;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  backdrop-filter: blur(5px);
}

/* BUTTONS */
.btn {
  padding: 12px 28px;
  border-radius: 30px;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
  display: inline-block;
  position: relative;
  overflow: hidden;
  z-index: 1;
}

.btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.1);
  transform: translateX(-100%);
  transition: transform 0.3s ease;
  z-index: -1;
}

.btn:hover::before {
  transform: translateX(0);
}

.primary-btn {
  background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
  color: white;
  border: none;
}

.primary-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
}

.secondary-btn {
  background: transparent;
  color: white;
  border: 2px solid white;
}

.secondary-btn:hover {
  background: white;
  color: #302b63;
}

/* SECTIONS */
section {
  position: relative;
  padding: 0;
  width: 100%;
  margin: 0;
}

.section-container {
 padding: 80px 2%; /* reduced padding */
  width: 100%;
  max-width: 100%;
  margin: 0 auto;
}

.section-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
}

.bg-pattern {
  width: 100%;
  height: 100%;
  background-image: radial-gradient(circle at 1px 1px, rgba(102, 126, 234, 0.1) 1px, transparent 1px);
  background-size: 20px 20px;
}

.section-header {
  text-align: center;
  margin-bottom: 60px;
}

.section-title {
  font-size: 2.5rem;
  margin-bottom: 15px;
  color: #111827;
  position: relative;
  display: inline-block;
}

.section-underline {
  width: 80px;
  height: 4px;
  background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
  margin: 0 auto;
  border-radius: 2px;
}

/* ABOUT */
.about {
  background: #ffffff;
  width: 100%;
}

.about-container {
  display: flex;
  gap: 50px;
  align-items: center;
  max-width: 100%;
  margin: 0 auto;
}

.about-image {
  flex: 1;
}

.image-container {
  position: relative;
  width: 100%;
  max-width: 400px;
  margin: 0 auto;
}

.profile-image {
  width: 100%;
  height: 400px;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
  position: relative;
}

.profile-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.profile-image:hover img {
  transform: scale(1.05);
}

.about-content {
  flex: 1;
}

.about-content p {
  font-size: 1.1rem;
  line-height: 1.8;
  margin-bottom: 20px;
  color: #4b5563;
}

/* SKILLS */
.skills {
  background: #f1f5f9;
  width: 100%;
}

.skills-container {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  justify-content: center;
  max-width: 100%;
  margin: 0 auto;
}

.skill-category {
  flex: 1;
  min-width: 300px;
  background: white;
  border-radius: 15px;
  padding: 25px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
  height: 250px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
}

.skill-category:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
}

.skill-category h3 {
  font-size: 1.5rem;
  margin-bottom: 20px;
  color: #111827;
  text-align: center;
  z-index: 2;
}

.skill-items {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  justify-content: center;
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.4s ease;
  z-index: 1;
  position: absolute;
  width: 100%;
  padding: 0 25px;
}

.skill-category:hover .skill-items {
  opacity: 1;
  transform: translateY(0);
}

.skill-item {
  display: flex;
  align-items: center;
  background: #f1f5f9;
  padding: 10px 15px;
  border-radius: 10px;
  transition: all 0.3s ease;
}

.skill-item:hover {
  background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
  color: white;
  transform: translateY(-3px);
}

.skill-icon {
  margin-right: 8px;
  font-size: 1.2rem;
  font-weight: bold;
  color: #667eea;
}

.skill-item:hover .skill-icon {
  color: white;
}

/* PROJECTS */
.projects {
  background: #ffffff;
  width: 100%;
}

.projects-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
  gap: 30px;
  max-width: 100%;
  margin: 0 auto;
}

.project-card {
  background: #f9fafb;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
  display: flex;
  flex-direction: column;
}

.project-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.project-image {
  height: 200px;
  overflow: hidden;
}

.project-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.project-card:hover .project-image img {
  transform: scale(1.05);
}

.project-content {
  padding: 25px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
}

.project-content h3 {
  font-size: 1.5rem;
  margin-bottom: 15px;
  color: #111827;
}

.project-content p {
  font-size: 1rem;
  line-height: 1.6;
  color: #4b5563;
  margin-bottom: 20px;
  flex-grow: 1;
}

.project-tech {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 20px;
}

.project-tech span {
  background: linear-gradient(90deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
  color: #667eea;
  padding: 5px 12px;
  border-radius: 20px;
  font-size: 0.9rem;
  font-weight: 500;
}

.project-links {
  display: flex;
  gap: 15px;
}

.project-link {
  color: #667eea;
  text-decoration: none;
  font-weight: 500;
  position: relative;
  transition: color 0.3s ease;
}

.project-link::after {
  content: '';
  position: absolute;
  bottom: -3px;
  left: 0;
  width: 0;
  height: 2px;
  background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
  transition: width 0.3s ease;
}

.project-link:hover::after {
  width: 100%;
}

/* CONTACT */
.contact {
  background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
  color: white;
  width: 100%;
}

.section-header .section-title {
  color: white;
}

.contact-container {
  display: flex;
  gap: 50px;
  max-width: 100%;
  margin: 0 auto;
}

.contact-info {
  flex: 1;
}

.contact-item {
  display: flex;
  align-items: center;
  margin-bottom: 30px;
}

.contact-icon {
  font-size: 1.5rem;
  margin-right: 20px;
  width: 60px;
  height: 60px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.contact-details h3 {
  font-size: 1.3rem;
  margin-bottom: 5px;
}

.contact-details p,
.contact-details a {
  color: #cbd5f5;
  text-decoration: none;
}

.contact-details a:hover {
  color: #a8edea;
}

.contact-form {
  flex: 1;
}

.form-group {
  margin-bottom: 20px;
}

.form-group input,
.form-group textarea {
  width: 100%;
  padding: 15px;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 8px;
  color: white;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.form-group input::placeholder,
.form-group textarea::placeholder {
  color: rgba(255, 255, 255, 0.5);
}

.form-group input:focus,
.form-group textarea:focus {
  outline: none;
  background: rgba(255, 255, 255, 0.15);
  border-color: #667eea;
}

/* FOOTER */
footer {
  background: #0f172a;
  padding: 30px 5%;
  color: #cbd5f5;
  width: 100%;
}

.footer-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 100%;
  margin: 0 auto;
}

.social-links {
  display: flex;
  gap: 20px;
}

.social-link {
  color: #cbd5f5;
  text-decoration: none;
  transition: color 0.3s ease;
}

.social-link:hover {
  color: #667eea;
}

/* BACK TO TOP */
.back-to-top {
  position: fixed;
  bottom: 30px;
  right: 30px;
  width: 50px;
  height: 50px;
  background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
  color: white;
  border: none;
  border-radius: 50%;
  cursor: pointer;
  transition: all 0.3s ease;
  z-index: 999;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

.back-to-top:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
}

/* ANIMATIONS */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes float {
  0%, 100% {
    transform: translateY(-50%) translateX(0) rotate(0deg);
  }
  33% {
    transform: translateY(-50%) translateX(20px) rotate(120deg);
  }
  66% {
    transform: translateY(-50%) translateX(-20px) rotate(240deg);
  }
}

@keyframes blink {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
}

/* RESPONSIVE */
@media (max-width: 992px) {
  .hero {
    flex-direction: column;
    padding: 0 5%;
    text-align: center;
  }
  
  .hero-content {
    max-width: 100%;
    margin-bottom: 30px;
  }
  
  .hero-animation {
    position: relative;
    right: auto;
    top: auto;
    transform: none;
    width: 100%;
    max-width: 500px;
  }
  
  .about-container {
    flex-direction: column;
  }
  
  .contact-container {
    flex-direction: column;
  }
}

@media (max-width: 768px) {
  .nav-menu {
    position: fixed;
    left: -100%;
    top: 70px;
    flex-direction: column;
    background-color: rgba(17, 24, 39, 0.95);
    width: 100%;
    text-align: center;
    transition: 0.3s;
    padding: 20px 0;
  }
  
  .nav-menu-active {
    left: 0;
  }
  
  .nav-item {
    margin: 15px 0;
  }
  
  .nav-toggle {
    display: flex;
  }
  
  .hero-title {
    font-size: 2.5rem;
  }
  
  .typing-container {
    font-size: 1.2rem;
  }
  
  .projects-container {
    grid-template-columns: 1fr;
  }
  
  .skill-categories {
    flex-direction: column;
  }
  
  .footer-container {
    flex-direction: column;
    gap: 20px;
    text-align: center;
  }
}

@media (max-width: 576px) {
  .section-container {
    padding: 60px 5%;
  }
  
  .hero-title {
    font-size: 2rem;
  }
  
  .hero-buttons {
    flex-direction: column;
    align-items: center;
  }
  
  .btn {
    width: 200px;
    text-align: center;
  }
}

</style>