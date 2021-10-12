<div class="p-widget p-widget--samonpink">
    <h2 class="title">病児・病後時保育</h2>
    <ul class="list">
<?php if(have_rows('sickchild_preschool')): ?>
        <li class="list__item"><a href="#sickchild10" class="smooth-scroll"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> 実施施設</a></li>
<?php endif; ?>

<?php $sickchild_time = get_field('sickchild_time');?>
<?php if( ! empty($sickchild_time)):?>
        <li class="list__item"><a href="#sickchild20" class="smooth-scroll"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> ご利用時間</a></li>
<?php endif; ?>

<?php $sickchild_fee = get_field('sickchild_fee');?>
<?php if( ! empty($sickchild_fee)):?>
        <li class="list__item"><a href="#sickchild30" class="smooth-scroll"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> ご利用料</a></li>
<?php endif; ?>

<?php $sickchild_lunch = get_field('sickchild_lunch');?>
<?php if( ! empty($sickchild_lunch)):?>
        <li class="list__item"><a href="#sickchild40" class="smooth-scroll"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> 給食</a></li>
<?php endif; ?>

<?php $sickchild_doctor = get_field('sickchild_doctor');?>
<?php if( ! empty($sickchild_doctor)):?>
        <li class="list__item"><a href="#sickchild50" class="smooth-scroll"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> 嘱託医</a></li>
<?php endif; ?>

<?php $sickchild_pickupsupport = get_field('sickchild_pickupsupport');?>
<?php if( ! empty($sickchild_pickupsupport)):?>
        <li class="list__item"><a href="#sickchild60" class="smooth-scroll"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> お迎えサポート</a></li>
<?php endif; ?>

<?php $sickchild_preregistration = get_field('sickchild_preregistration');?>
<?php if( ! empty($sickchild_preregistration)):?>
        <li class="list__item"><a href="#sickchild70" class="smooth-scroll"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> 事前登録</a></li>
<?php endif; ?>

<?php $sickchild_flow = get_field('sickchild_flow');?>
<?php if( ! empty($sickchild_flow)):?>
        <li class="list__item"><a href="#sickchild80" class="smooth-scroll"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> ご利用までの流れ</a></li>
<?php endif; ?>
    </ul>
</div>