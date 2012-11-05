
<style>
  #calcInnerDiv {
    width: 500px;
    height: 400px;
    background: white;
    margin-bottom: 100px;
    margin-left: 50px;
    moz-border-radius: 15px;
    border-radius: 15px;
    padding: 25px;
  }
  #calcMainDiv {
    background-image: url('<?php echo Yii::app()->request->baseUrl . $imgUrl; ?>');
    background-repeat:no-repeat;
    background-size: 100%;
    height: 800px;
    padding-top: 100px;
  }
</style>


<div id="calcMainDiv">
  
  <div id="calcInnerDiv">
    <?php $this->renderPartial($viewToRender, $subViewVars); ?>
  </div>

</div>
