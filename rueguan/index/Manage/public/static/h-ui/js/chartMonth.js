function indexChartMonth(dateArr,dataArr,num){
	var str = "如e课时";	
	if(num == 0){
		str = "使用人数";
	}else if(num == 1){
		str = "使用课时";
	}else if(num == 2){
		str = "使用时长";
	}else if(num == 3){
		str = "课堂互动";
	}
	var myChart  = echarts.init(document.getElementById("chartMonth"));
	var option = {			   
		    tooltip : {
		        trigger: 'axis'
		    },
		    legend: {
			        orient: 'horizontal',
			        left: '830px',
			        top:"10px",
			        data: [str]
			},
		    grid: {
		        left: '3%',
		        right: '4%',
		        bottom: '3%',
		        containLabel: true
		    },
		    xAxis : [
		        {

		            type : 'category',
		            boundaryGap : false,
		            triggerEvent: true,
		            axisLabel:{
			            formatter: function (value, index) {
						    return value.substr(8,4);
						} 
		            },
		            data :dateArr
		        }
		    ],
		    yAxis : [
		        {
		        	name:str,
		            type : 'value',
		            axisLine:{show:false}
		        }
		    ],
		    series : [
		        {
		            name:str,
		            type:'line',
		            stack: str,
		            smooth:true,
//		            symbol:'emptytriangle',    //也可是图片链接升
		            symbolSize:8,
//		            markPoint:{data:[ {
//						            	name: '最大值',
//								        type: 'max'
//								      }]},
		            itemStyle :{normal:{ color:'#295ffe',  lineStyle:{color:'#295ffe'  },label : {show: true}}},		            
		            data:dataArr
		        }
		    ]
	};		
	
	myChart.setOption(option);
	//tooltips自动循环
	var tempTimer = null;
	var app = {};
    app.currentIndex = -1;
    tempTimer = setInterval(fnTime, 1000);
    function fnTime(){
    	var dataLen = option.series[0].data.length;
        // 取消之前高亮的图形
        myChart.dispatchAction({
            type: 'downplay',
            seriesIndex: 0,
            dataIndex: app.currentIndex
        });
        app.currentIndex = (app.currentIndex + 1) % dataLen;
        // 高亮当前图形
        myChart.dispatchAction({
            type: 'highlight',
            seriesIndex: 0,
            dataIndex: app.currentIndex
        });
        // 显示 tooltip
        myChart.dispatchAction({
            type: 'showTip',
            seriesIndex: 0,
            dataIndex: app.currentIndex
        });
    }
    //鼠标移入移出控制定时器循环
    $('.chart-body .chart-box canvas').on('mouseenter',function(){
    	clearInterval(tempTimer);
    })
    $('.chart-body .chart-box canvas').on('mouseout',function(){
    	tempTimer = setInterval(fnTime, 1000);
    })
}
function indexCharPia(useNum,NoUse,useTime,NoTime){
	//初始化饼图
		var myChart1 = echarts.init(document.getElementById('piePerson'));	
		var option1 = {
			    tooltip: {
			        trigger: 'item',
			        formatter: "{a} <br/>{b} : {c} ({d}%)"
			    },
			    color:['#315EDB','#CF64E6'],
			    legend: {
			        orient: 'horizontal',
			        left: 'center',
			        bottom:"10px",
			        data: ['使用人数','未使用人数']
			    },
			    series : [
			        {
			            name: '访问来源',
			            type: 'pie',
			            radius : '55%',
			            center: ['45%', '40%'],
			            data:[
			                {value:useNum, name:'使用人数'},
			                {value:NoUse, name:'未使用人数'}
			            ],
			            itemStyle: {
			                emphasis: {
			                    shadowBlur: 10,
			                    shadowOffsetX: 0,
			                    shadowColor: 'rgba(0, 0, 0, 0.5)'
			                },
			                normal:{
				                  label:{
				                    show: true,
				                    formatter: '{b} : {c}'
				                  },
				                  labelLine :{show:true}
			                }
			            }
			        }
			    ]
		};		
		myChart1.setOption(option1);
		
		var myChart2 = echarts.init(document.getElementById('pieTime'));	
		var option2 = {
			    tooltip: {
			        trigger: 'item',
			        formatter: "{a} <br/>{b} : {c} ({d}%)"
			    },
			    color:['#22cdf4','#7d39fd'],
			    legend: {
			        orient: 'horizontal',
			        left: 'center',
			        bottom:"10px",
			        data: ['使用课时','未使用课时']
			    },
			    series : [
			        {
			            name: '访问来源',
			            type: 'pie',
			            radius : '55%',
			            center: ['45%', '40%'],
			            data:[
			                {value:useTime, name:'使用课时'},
			                {value:NoTime, name:'未使用课时'}
			            ],
			            itemStyle: {
			                emphasis: {
			                    shadowBlur: 10,
			                    shadowOffsetX: 0,
			                    shadowColor: 'rgba(0, 0, 0, 0.5)'
			                },
			                normal:{
				                  label:{
				                    show: true,
				                    formatter: '{b} : {c}'
				                  },
				                  labelLine :{show:true}
			                }
			            }
			        }
			    ]
		};				
		myChart2.setOption(option2);
		
}
