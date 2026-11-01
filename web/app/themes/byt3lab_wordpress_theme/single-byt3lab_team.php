<?php
/**
 * Single Template: Membre de l'Équipe BYT3LAB
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
get_template_part('components/header/header');

$role        = get_post_meta(get_the_ID(), '_byt3lab_team_role', true) ?: 'Membre de l\'Équipe';
$dept        = get_post_meta(get_the_ID(), '_byt3lab_team_department', true) ?: 'Byt3lab Tech';
$bio_short   = get_post_meta(get_the_ID(), '_byt3lab_team_bio_short', true);
$linkedin    = get_post_meta(get_the_ID(), '_byt3lab_team_linkedin', true);
$github      = get_post_meta(get_the_ID(), '_byt3lab_team_github', true);
$twitter     = get_post_meta(get_the_ID(), '_byt3lab_team_twitter', true);
$custom_photo = get_post_meta(get_the_ID(), '_byt3lab_team_photo', true);
$avatar_url   = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : (!empty($custom_photo) ? $custom_photo : 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=600');
?>

<main id="primary" class="site-main bg-white text-dark py-5" style="background: radial-gradient(circle at top right, rgba(2, 132, 199, 0.06), transparent 50%), #ffffff;">
    <div class="container py-5">
        
        <!-- Breadcrumb / Back button -->
        <div class="mb-4 text-start">
            <a href="<?php echo esc_url(home_url('/equipe/')); ?>" class="btn btn-sm btn-outline-secondary font-monospace d-inline-flex align-items-center gap-2" style="border-radius: 8px;">
                <span>&larr;</span> Retour à l'équipe
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card card-premium p-4 p-md-5 overflow-hidden">
                    <div class="row align-items-center g-5 text-start">
                        
                        <!-- Col 1: Photo Avatar & Socials -->
                        <div class="col-md-5 text-center">
                            <div class="team-avatar-wrapper shadow-lg" style="width: 180px; height: 180px; margin-bottom: 24px;">
                                <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php the_title_attribute(); ?>" class="team-avatar-img" />
                            </div>
                            
                            <span class="badge px-3 py-2 rounded-pill font-monospace mb-3 d-inline-block" style="background: rgba(2, 132, 199, 0.1); color: #0284c7; font-size: 12px;" data-bs-toggle="tooltip" title="Département">
                                <?php echo esc_html($dept); ?>
                            </span>

                            <!-- Social Links with Tooltips -->
                            <div class="d-flex justify-content-center gap-2 mt-2">
                                <?php if (!empty($linkedin)) : ?>
                                    <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer" class="team-social-link" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="LinkedIn">
                                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.2V10.9H6.46M7.83 6.45c-.9 0-1.63.73-1.63 1.63 0 .9.73 1.63 1.63 1.63.9 0 1.63-.73 1.63-1.63 0-.9-.73-1.63-1.63-1.63z"/></svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($github)) : ?>
                                    <a href="<?php echo esc_url($github); ?>" target="_blank" rel="noopener noreferrer" class="team-social-link" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="GitHub">
                                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.87 1.52 2.34 1.07 2.91.83.1-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1.03-2.71-.1-.25-.45-1.29.1-2.64 0 0 .84-.27 2.75 1.02.79-.22 1.65-.33 2.5-.33.85 0 1.71.11 2.5.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.64.65.71 1.03 1.6 1.03 2.71 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2z"/></svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($twitter)) : ?>
                                    <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer" class="team-social-link" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="X / Twitter">
                                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($whatsapp)) : ?>
                                    <a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', $whatsapp)); ?>" target="_blank" rel="noopener noreferrer" class="team-social-link" style="width: 40px; height: 40px;" data-bs-toggle="tooltip" title="WhatsApp Direct">
                                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.26-1.5-1.4-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.23.9 2.43 1.03 2.6.13.17 1.77 2.7 4.29 3.78.6.26 1.07.41 1.44.53.6.19 1.15.16 1.59.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.07-.1-.23-.17-.48-.29z"/></svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Col 2: Name, Role & Bio -->
                        <div class="col-md-7">
                            <h1 class="f-nasalization display-5 fw-bold mb-2" style="color: #0f172a;"><?php the_title(); ?></h1>
                            <div class="fs-5 fw-semibold mb-4 font-monospace" style="color: #0284c7;"><?php echo esc_html($role); ?></div>

                            <?php if (!empty($bio_short)) : ?>
                                <div class="p-3 rounded-3 mb-4" style="background: #f8fafc; border-left: 4px solid #0284c7;">
                                    <p class="mb-0" style="color: #475569; font-size: 15px; font-style: italic;">
                                        "<?php echo esc_html($bio_short); ?>"
                                    </p>
                                </div>
                            <?php endif; ?>

                            <div class="entry-content mb-4" style="color: #334155; line-height: 1.7; font-size: 16px;">
                                <?php the_content(); ?>
                            </div>

                            <div class="d-flex gap-3 flex-wrap pt-3 border-top">
                                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="a-button a-button--primary btn btn-lg py-2 px-4 fw-bold" style="border-radius: 8px;">
                                    Collaborer avec nous
                                </a>
                                <a href="<?php echo esc_url(home_url('/solutions/')); ?>" class="btn btn-outline-primary btn-lg py-2 px-4 fw-bold" style="border-radius: 8px; border-color: #0284c7; color: #0284c7;">
                                    Découvrir nos solutions
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php
get_template_part('components/footer/footer');
get_footer();
