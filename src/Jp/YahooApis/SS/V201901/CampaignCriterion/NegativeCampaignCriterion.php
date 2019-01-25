<?php

namespace Jp\YahooApis\SS\V201901\CampaignCriterion;

class NegativeCampaignCriterion extends CampaignCriterion
{

    /**
     * @param CampaignCriterionUse $criterionUse
     * @param Criterion $criterion
     */
    public function __construct($criterionUse, $criterion)
    {
      parent::__construct($criterionUse, $criterion);
    }

}
