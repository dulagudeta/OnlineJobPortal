<?php 
include 'header.php'; 
include '../functions/fetch_company.php';
?>
<div id="companies-content">
    <h2 class="section-title" data-translate="companies">Companies You May Find</h2>
    <?php $company_list=fetch_company($conn) ?>
    <div class="card">
        <?php if (empty($company_list)) : ?>
            <p data-translate="no_companies_found">No companies found.</p>
        <?php else : ?>
            <?php foreach ($company_list as $company) : ?>
                <div class="company-card">
                    <h3><?php echo htmlspecialchars($company['name']); ?></h3>
                    <div class="job-meta">
                        <p data-translate="location"><i class="fas fa-map-marker-alt"></i>Location: <?php echo htmlspecialchars($company['location']); ?></p> 
                        <p data-translate="industry"><i class="fas fa-industry"></i>Industry: <?php echo htmlspecialchars($company['industry']); ?></p>
                    </div>
                    <a href="company_detail.php?company_id=<?php echo $company['user_id']?>" class="btn" data-translate="see_more">See More</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php include 'footer.php' ?>