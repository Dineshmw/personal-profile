<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinesh Weerasekara - Backend & Full Stack Developer</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#3b82f6', // blue-500
                        secondary: '#1e293b', // slate-800
                        accent: '#0ea5e9' // sky-500
                    }
                }
            }
        }
    </script>
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .skill-bar-fill {
            transition: width 1.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-100 font-sans antialiased selection:bg-accent selection:text-white">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 glass shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <a href="#" class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-accent">DW.</a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#about" class="hover:text-primary transition duration-300">About</a>
                        <a href="#skills" class="hover:text-primary transition duration-300">Skills</a>
                        <a href="#projects" class="hover:text-primary transition duration-300">Projects</a>
                        <a href="#contact" class="hover:text-primary transition duration-300">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="about" class="relative min-h-screen flex items-center pt-20 overflow-hidden">
        <!-- Abstract Background Shapes -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-20 left-10 w-72 h-72 bg-primary rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute top-40 right-10 w-72 h-72 bg-accent rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-40 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="text-center md:text-left md:flex items-center justify-between">
                <div class="md:w-1/2">
                    <h2 class="text-primary font-semibold tracking-wide uppercase text-sm mb-2">Hello, I'm</h2>
                    <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6 mt-4">
                        Dinesh <br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Weerasekara</span>
                    </h1>
                    <p class="mt-4 text-xl text-gray-400 max-w-2xl mx-auto md:mx-0">
                        I build dynamic, scalable, and beautiful web applications. Specializing in PHP Laravel, modern frontend frameworks, and robust database architectures.
                    </p>
                    <div class="mt-10 flex justify-center md:justify-start gap-4">
                        <a href="#projects" class="px-8 py-3 rounded-full bg-gradient-to-r from-primary to-accent text-white font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                            View My Work
                        </a>
                        <a href="#contact" class="px-8 py-3 rounded-full glass border border-gray-600 hover:bg-gray-800 text-white font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                            Contact Me
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 mt-12 md:mt-0 flex justify-center relative">
                    <img src="{{ asset('images/profile.jpg') }}" alt="Dinesh Weerasekara Profile" class="w-64 h-64 md:w-96 md:h-96 rounded-full object-cover shadow-2xl z-10 border-4 border-gray-800 relative shadow-primary/30" />
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 bg-gray-900 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold">Technical <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Skills</span></h2>
                <div class="h-1 w-20 bg-primary mx-auto mt-4 rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($skills as $skill)
                <div class="glass p-6 rounded-2xl group hover:-translate-y-1 transition duration-300">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">{{ $skill->name }}</span>
                        <span class="text-primary">{{ $skill->proficiency }}%</span>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2.5 overflow-hidden">
                        <div class="bg-gradient-to-r from-primary to-accent h-2.5 rounded-full skill-bar-fill" style="width: {{ $skill->proficiency }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20 relative bg-gray-900 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold">Personal <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Projects</span></h2>
                <div class="h-1 w-20 bg-primary mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-gray-400">A selection of recent work stored in the MySQL database.</p>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button class="filter-btn active px-6 py-2 rounded-full glass border border-primary text-white font-medium hover:bg-primary/20 transition-all duration-300" data-filter="all">All</button>
                <button class="filter-btn px-6 py-2 rounded-full glass border border-gray-600 text-gray-300 font-medium hover:bg-gray-800 transition-all duration-300" data-filter="Backend/Frontend">Backend/Frontend</button>
                <button class="filter-btn px-6 py-2 rounded-full glass border border-gray-600 text-gray-300 font-medium hover:bg-gray-800 transition-all duration-300" data-filter="Data Science Machine learning">Data Science / ML</button>
                <button class="filter-btn px-6 py-2 rounded-full glass border border-gray-600 text-gray-300 font-medium hover:bg-gray-800 transition-all duration-300" data-filter="Gen AI">Gen AI</button>
                <button class="filter-btn px-6 py-2 rounded-full glass border border-gray-600 text-gray-300 font-medium hover:bg-gray-800 transition-all duration-300" data-filter="Automations">Automations</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="projectsGrid">
                @foreach($projects as $project)
                <div class="project-card glass rounded-2xl overflow-hidden group cursor-pointer border border-gray-800 hover:border-primary transition-all duration-500 flex flex-col" data-category="{{ $project->category }}" style="transition: opacity 0.3s ease, transform 0.3s ease;">
                    <div class="relative overflow-hidden aspect-video">
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-60"></div>
                        <div class="absolute top-4 right-4 bg-gray-900/80 backdrop-blur-sm text-xs font-semibold px-3 py-1 rounded-full text-primary border border-primary/30">
                            {{ $project->category }}
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold mb-2 group-hover:text-primary transition duration-300">{{ $project->title }}</h3>
                        <p class="text-gray-400 text-sm mb-6 flex-grow">{{ $project->description }}</p>
                        <a href="{{ $project->project_url }}" class="inline-flex items-center text-accent hover:text-primary transition duration-300 font-semibold text-sm uppercase tracking-wider">
                            View Project
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-900 border-t border-gray-800 relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-primary rounded-full mix-blend-multiply filter blur-[100px] opacity-10"></div>
        </div>
        
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Let's Work Together</h2>
            <p class="text-gray-400 mb-10 text-lg">Interested in collaborating or have a project in mind? I'm currently open for new opportunities.</p>
            <a href="mailto:contact@dineshweerasekara.com" class="inline-flex items-center justify-center px-8 py-4 text-base font-medium rounded-full text-white bg-gradient-to-r from-primary to-accent hover:shadow-lg hover:shadow-primary/30 transition-all duration-300 hover:-translate-y-1">
                Say Hello
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-950 py-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} Dinesh Weerasekara. Built with Laravel & Tailwind CSS.</p>
        </div>
    </footer>

    <style>
        /* Animation utilities missing from base Tailwind via generic CDN */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const projectCards = document.querySelectorAll('.project-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Update active button state
                    filterBtns.forEach(b => {
                        b.classList.remove('border-primary', 'text-white');
                        b.classList.add('border-gray-600', 'text-gray-300');
                    });
                    btn.classList.add('border-primary', 'text-white');
                    btn.classList.remove('border-gray-600', 'text-gray-300');

                    const filterValue = btn.getAttribute('data-filter');

                    // Filter cards
                    projectCards.forEach(card => {
                        if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                            card.style.display = 'flex';
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'scale(1)';
                            }, 50);
                        } else {
                            card.style.opacity = '0';
                            card.style.transform = 'scale(0.95)';
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300); // Wait for transition
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
