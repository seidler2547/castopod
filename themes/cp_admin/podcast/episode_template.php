<?= $this->extend('_layout') ?>

<?= $this->section('title') ?>
<?= lang('Podcast.episode_template') ?>
<?= $this->endSection() ?>

<?= $this->section('pageTitle') ?>
<?= lang('Podcast.episode_template') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<form action="<?= route_to('podcast-episode-template', $podcast->id) ?>" method="POST" class="flex flex-col w-full max-w-xl gap-y-6">
<?= csrf_field() ?>

<Forms.Section
    title="<?= lang('Podcast.form.episode_template_section_title') ?>"
    subtitle="<?= lang('Podcast.form.episode_template_section_subtitle') ?>" >

<Forms.Field
    name="title"
    label="<?= esc(lang('Episode.form.title')) ?>"
    hint="<?= esc(lang('Episode.form.title_hint')) ?>"
    value="<?= esc($episodeTemplate['title']) ?>" />

<Forms.Toggler class="mt-2" name="prefill_episode_number" value="yes" checked="<?= $episodeTemplate['prefill_episode_number'] ? 'true' : 'false' ?>">
    <?= lang('Podcast.form.episode_template_prefill_episode_number') ?></Forms.Toggler>

<fieldset class="flex gap-1">
<legend><?= lang('Episode.form.type.label') ?></legend>
<Forms.RadioButton
    value="full"
    name="type"
    hint="<?= esc(lang('Episode.form.type.full_hint')) ?>"
    isChecked="<?= $episodeTemplate['type'] === 'full' ? 'true' : 'false' ?>" ><?= lang('Episode.form.type.full') ?></Forms.RadioButton>
<Forms.RadioButton
    value="trailer"
    name="type"
    hint="<?= esc(lang('Episode.form.type.trailer_hint')) ?>"
    isChecked="<?= $episodeTemplate['type'] === 'trailer' ? 'true' : 'false' ?>" ><?= lang('Episode.form.type.trailer') ?></Forms.RadioButton>
<Forms.RadioButton
    value="bonus"
    name="type"
    hint="<?= esc(lang('Episode.form.type.bonus_hint')) ?>"
    isChecked="<?= $episodeTemplate['type'] === 'bonus' ? 'true' : 'false' ?>" ><?= lang('Episode.form.type.bonus') ?></Forms.RadioButton>
</fieldset>

<fieldset class="flex gap-1">
<legend>
    <?= lang('Episode.form.parental_advisory.label') .
        hint_tooltip(lang('Episode.form.parental_advisory.hint'), 'ml-1') ?>
</legend>
<Forms.RadioButton
    value="undefined"
    name="parental_advisory"
    isChecked="<?= $episodeTemplate['parental_advisory'] === 'undefined' ? 'true' : 'false' ?>" ><?= lang('Episode.form.parental_advisory.undefined') ?></Forms.RadioButton>
<Forms.RadioButton
    value="clean"
    name="parental_advisory"
    isChecked="<?= $episodeTemplate['parental_advisory'] === 'clean' ? 'true' : 'false' ?>" ><?= lang('Episode.form.parental_advisory.clean') ?></Forms.RadioButton>
<Forms.RadioButton
    value="explicit"
    name="parental_advisory"
    isChecked="<?= $episodeTemplate['parental_advisory'] === 'explicit' ? 'true' : 'false' ?>" ><?= lang('Episode.form.parental_advisory.explicit') ?></Forms.RadioButton>
</fieldset>

<Forms.Field
    as="MarkdownEditor"
    name="description"
    label="<?= esc(lang('Episode.form.description')) ?>"
    value="<?= esc($episodeTemplate['description']) ?>"
    disallowList="header,quote" />

<Forms.Field
    name="location_name"
    label="<?= esc(lang('Episode.form.location_name')) ?>"
    hint="<?= esc(lang('Episode.form.location_name_hint')) ?>"
    value="<?= esc($episodeTemplate['location_name']) ?>" />

<Forms.Field
    as="XMLEditor"
    name="custom_rss"
    label="<?= esc(lang('Episode.form.custom_rss')) ?>"
    hint="<?= esc(lang('Episode.form.custom_rss_hint')) ?>"
    content="<?= esc($episodeTemplate['custom_rss']) ?>" />

<Forms.Toggler name="block" value="yes" checked="<?= $episodeTemplate['is_blocked'] ? 'true' : 'false' ?>" hint="<?= esc(lang('Episode.form.block_hint')) ?>"><?= lang('Episode.form.block') ?></Forms.Toggler>

</Forms.Section>

<Button variant="primary" type="submit" class="self-end"><?= lang('Common.forms.save') ?></Button>

</form>
<?= $this->endSection() ?>
