<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

<section class="min-h-[80vh] flex items-center justify-center bg-[#1C1C1E] px-4 py-16 overflow-hidden relative">
    
    <!-- Animated background blobs -->
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-blob"></div>
    <div class="absolute -bottom-40 -right-40 w-[500px] h-[500px] bg-white/10 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-white/10 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
    
    <div class="max-w-2xl mx-auto text-center relative z-10">
        
        <!-- Liquid Glass Card -->
        <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl p-8 md:p-12 shadow-2xl animate-fade-in-up">
            
            <!-- 404 Number with animation -->
            <div class="relative mb-6">
                <div class="relative inline-block">
                    <!-- Glowing shadow -->
                    <div class="absolute inset-0 text-[120px] md:text-[180px] font-black text-white/40 blur-2xl animate-glow leading-none select-none">
                        404
                    </div>
                    <!-- Main number -->
                    <h1 class="relative text-[120px] md:text-[180px] font-black leading-none select-none animate-float">
                        <span class="text-transparent bg-clip-text bg-gradient-to-br from-white via-gray-200 to-gray-400">4</span>
                        <span class="text-transparent bg-clip-text bg-gradient-to-br from-gray-300 via-white to-gray-200 animate-spin-slow inline-block">0</span>
                        <span class="text-transparent bg-clip-text bg-gradient-to-br from-gray-400 via-gray-200 to-white">4</span>
                    </h1>
                </div>
            </div>
            
            <!-- Content -->
            <div class="space-y-6">
                <div class="space-y-3">
                    <h2 class="text-2xl md:text-3xl font-bold text-white">
                        Oeps! Pagina niet gevonden
                    </h2>
                    <p class="text-white/70 text-lg max-w-md mx-auto">
                        De pagina die je zoekt bestaat niet of is verplaatst. Geen zorgen, we helpen je graag verder!
                    </p>
                </div>
                
                <!-- Divider -->
                <div class="h-px bg-gradient-to-r from-transparent via-white/30 to-transparent my-6"></div>
                
                <!-- Action buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="<?php echo esc_url(home_url('/')); ?>" 
                       class="group inline-flex items-center gap-2 bg-primary-700 border border-primary-600 text-white rounded-2xl cursor-pointer font-medium text-center shadow-lg transition-all duration-300 py-3.5 px-8 text-base hover:bg-primary-600 hover:shadow-primary-500/25 hover:shadow-xl hover:-translate-y-1">
                        <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Terug naar home
                    </a>
                    
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" 
                       class="group inline-flex items-center gap-2 bg-white/10 border border-white/30 text-white rounded-2xl cursor-pointer font-medium text-center backdrop-blur transition-all duration-300 py-3.5 px-8 text-base hover:bg-white/20 hover:border-white/50 hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Neem contact op
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Floating glass particles -->
        <div class="absolute -top-4 -left-4 w-16 h-16 bg-white/5 backdrop-blur border border-white/10 rounded-2xl animate-float rotate-12"></div>
        <div class="absolute -bottom-6 -right-6 w-20 h-20 bg-white/5 backdrop-blur border border-white/10 rounded-3xl animate-float animation-delay-1000 -rotate-12"></div>
        <div class="absolute top-1/4 -right-8 w-12 h-12 bg-white/5 backdrop-blur border border-white/10 rounded-xl animate-float animation-delay-2000 rotate-45"></div>
        <div class="absolute bottom-1/4 -left-6 w-14 h-14 bg-white/5 backdrop-blur border border-white/10 rounded-2xl animate-float animation-delay-3000 -rotate-6"></div>
    </div>
    
    <!-- Corner decorative elements -->
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-0 right-0 w-48 h-48 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
</section>

<style>
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        25% { transform: translate(20px, -30px) scale(1.1); }
        50% { transform: translate(-20px, 20px) scale(0.9); }
        75% { transform: translate(30px, 10px) scale(1.05); }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(var(--rotation, 0deg)); }
        50% { transform: translateY(-15px) rotate(var(--rotation, 0deg)); }
    }
    @keyframes glow {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(1.02); }
    }
    @keyframes spin-slow {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    @keyframes fade-in-up {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-blob { animation: blob 8s ease-in-out infinite; }
    .animate-float { animation: float 5s ease-in-out infinite; }
    .animate-glow { animation: glow 3s ease-in-out infinite; }
    .animate-spin-slow { animation: spin-slow 25s linear infinite; }
    .animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; }
    .animation-delay-1000 { animation-delay: 1s; }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-3000 { animation-delay: 3s; }
    .animation-delay-4000 { animation-delay: 4s; }
</style>

<?php
get_footer();
