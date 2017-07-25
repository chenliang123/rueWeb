function indexChart(data,hours,days){
	var myChart  = echarts.init(document.getElementById("chart"));

//	var hours=['0','2','4','6','8','10','12','14','16','18','20','22','24','26','28','30','32','34','36','38','40','42','44','46'];

//	var days=['语文','数学','英语','音乐','体育','绘画','信息技术'];
	
//	var data = [[0,0,0,'-'],[0,1,0,'-'],[0,2,0,'-'],[0,3,0,'-'],[0,4,0,'-'],[0,5,0,'-'],[0,6,0,'-'],[0,7,0,'-'],[0,8,7,'曹占连'],[0,9,11,'李自娥'],[0,10,7,'李灿灿'],[0,11,0,'-'],[0,12,0,'-'],[0,13,0,'-'],[0,14,0,'-'],[0,15,0,'-'],[0,16,0,'-'],[0,17,0,'-'],[0,18,0,'-'],[0,19,0,'-'],[0,20,0,'-'],[0,21,0,'-'],[0,22,0,'-'],[0,23,0,'-'],[1,0,0,'-'],[1,1,0,'-'],[1,2,0,'-'],[1,3,7,'李灿灿'],[1,4,11,'侯少云'],[1,5,11,'杨帆'],[1,6,0,'-'],[1,7,0,'-'],[1,8,0,'-'],[1,9,13,'紫雪娇'],[1,10,9,'付灵燕'],[1,11,0,'-'],[1,12,0,'-'],[1,13,0,'-'],[1,14,0,'-'],[1,15,0,'-'],[1,16,0,'-'],[1,17,0,'-'],[1,18,0,'-'],[1,19,0,'-'],[1,20,0,'-'],[1,21,0,'-'],[1,22,0,'-'],[1,23,0,'-'],[2,0,0,'-'],[2,1,0,'-'],[2,2,0,'-'],[2,3,0,'-'],[2,4,0,'-'],[2,5,0,'-'],[2,6,0,'-'],[2,7,0,'-'],[2,8,0,'-'],[2,9,0,'-'],[2,10,0,'-'],[2,11,0,'-'],[2,12,0,'-'],[2,13,0,'-'],[2,14,0,'-'],[2,15,0,'-'],[2,16,0,'-'],[2,17,0,'-'],[2,18,0,'-'],[2,19,0,'-'],[2,20,0,'-'],[2,21,0,'-'],[2,22,0,'-'],[2,23,0,'-'],[3,0,0,'-'],[3,1,0,'-'],[3,2,0,'-'],[3,3,0,'-'],[3,4,0,'-'],[3,5,0,'-'],[3,6,0,'-'],[3,7,0,'-'],[3,8,0,'-'],[3,9,0,'-'],[3,10,0,'-'],[3,11,0,'-'],[3,12,0,'-'],[3,13,0,'-'],[3,14,0,'-'],[3,15,0,'-'],[3,16,0,'-'],[3,17,0,'-'],[3,18,0,'-'],[3,19,0,'-'],[3,20,0,'-'],[3,21,0,'-'],[3,22,0,'-'],[3,23,0,'-'],[4,0,0,'-'],[4,1,0,'-'],[4,2,0,'-'],[4,3,0,'-'],[4,4,0,'-'],[4,5,0,'-'],[4,6,0,'-'],[4,7,0,'-'],[4,8,0,'-'],[4,9,0,'-'],[4,10,0,'-'],[4,11,0,'-'],[4,12,0,'-'],[4,13,0,'-'],[4,14,0,'-'],[4,15,0,'-'],[4,16,0,'-'],[4,17,0,'-'],[4,18,0,'-'],[4,19,0,'-'],[4,20,0,'-'],[4,21,0,'-'],[4,22,0,'-'],[4,23,0,'-'],[5,0,0,'-'],[5,1,0,'-'],[5,2,0,'-'],[5,3,0,'-'],[5,4,0,'-'],[5,5,0,'-'],[5,6,0,'-'],[5,7,0,'-'],[5,8,0,'-'],[5,9,0,'-'],[5,10,0,'-'],[5,11,0,'-'],[5,12,0,'-'],[5,13,0,'-'],[5,14,0,'-'],[5,15,0,'-'],[5,16,0,'-'],[5,17,0,'-'],[5,18,0,'-'],[5,19,0,'-'],[5,20,0,'-'],[5,21,0,'-'],[5,22,0,'-'],[5,23,0,'-'],[6,0,0,'-'],[6,1,0,'-'],[6,2,13,'秦杰'],[6,3,0,'-'],[6,4,0,'-'],[6,5,0,'-'],[6,6,0,'-'],[6,7,0,'-'],[6,8,0,'-'],[6,9,0,'-'],[6,10,0,'-'],[6,11,0,'-'],[6,12,0,'-'],[6,13,0,'-'],[6,14,0,'-'],[6,15,0,'-'],[6,16,6,'秦杰'],[6,17,0,'-'],[6,18,0,'-'],[6,19,0,'-'],[6,20,0,'-'],[6,21,0,'-'],[6,22,0,'-'],[6,23,0,'-']] ;
	console.log(hours)
	console.log(days);
	console.log(data)
	option = {
	    tooltip: {
	        position: 'top'
	    },
		toolbox: {
	        show : true,
	        feature : {
	            dataView : {show: true, readOnly: false},
	            magicType : {show: true, type: ['line', 'bar']},
	            restore : {show: true},
	            saveAsImage : {show: true}
	        },
	        right:40,
	        top:-5
	    },
	    title: [],
	    singleAxis: [],
	    series: []
	};

	echarts.util.each(days, function (day, idx) {
	    option.title.push({
	    	left:10,
	        textBaseline: 'middle',
	        top: (idx * 100 / days.length + 7) + '%',
	        text: day,
	        textStyle:{
	            color: '#333',
	            fontStyle: 'normal',
	            fontWeight: 'normal',
	            fontFamily: 'sans-serif',
	            fontSize: 15
	        }
	    });
	    option.singleAxis.push({
	        left: 100,
	        type: 'category',
	        boundaryGap: false,
	        data: hours,
	        top: (idx * 100 / days.length + 5) + '%',
	        height: (100 / 7 - 10) + '%',
	        axisLabel: {
	            interval: 0
	        }
	    });
	    option.series.push({
	        singleAxisIndex: idx,
	        coordinateSystem: 'singleAxis',
	        type: 'scatter',
	        data: [],
	        symbolSize: function (dataItem) {
	            return dataItem[1] * 4;
	        }
	    });
	});

	echarts.util.each(data, function (dataItem) {
	    option.series[dataItem[0]].data.push([dataItem[1], dataItem[2],dataItem[3]]);
	});
	myChart.setOption(option);
}
function indexChart2(nameData,pageArr,interArr,tiwenArr,callArr,questArr,rewardArr,photoArr,pizhuArr){
	var myChart  = echarts.init(document.getElementById("chart"));

	option = {
	    tooltip : {
	        trigger: 'axis',
	        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
	            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
	        }
	    },
	    toolbox: {
	        show : true,
	        feature : {
	            dataView : {show: true, readOnly: false},
	            magicType : {show: true, type: ['line', 'bar']},
	            restore : {show: true},
	            saveAsImage : {show: true}
	        },
	        right:40,
	        top:20
	    },
	    legend: {
	        data: ['课均讲授课件页数', '课均互动次数','课均提问次数',,'课均点名次数','课均出题次数','课均奖励次数','课均拍照次数','课均批注次数']
	    },
	    grid: {
	        left: '3%',
	        right: '4%',
	        bottom: '3%',
	        containLabel: true
	    },
	    xAxis:  {
	        type: 'value'
	    },
	    yAxis: {
	        type: 'category',
	        data: nameData
	    },
	    series: [
	        {
	            name: '课均讲授课件页数',
	            type: 'bar',
	            stack: '总量',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight'
	                }
	            },
	            data: pageArr
	        },
	        {
	            name: '课均互动次数',
	            type: 'bar',
	            stack: '总量',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight'
	                }
	            },
	            data: interArr
	        },
	        {
	            name: '课均提问次数',
	            type: 'bar',
	            stack: '总量',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight'
	                }
	            },
	            data: tiwenArr
	        },
	        {
	            name: '课均点名次数',
	            type: 'bar',
	            stack: '总量',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight'
	                }
	            },
	            data: callArr
	        },
	        {
	            name: '课均出题次数',
	            type: 'bar',
	            stack: '总量',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight'
	                }
	            },
	            data: questArr
	        },
	        {
	            name: '课均奖励次数',
	            type: 'bar',
	            stack: '总量',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight'
	                }
	            },
	            data: rewardArr
	        },
	        {
	            name: '课均拍照次数',
	            type: 'bar',
	            stack: '总量',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight'
	                }
	            },
	            data: photoArr
	        },
	        {
	            name: '课均批注次数',
	            type: 'bar',
	            stack: '总量',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight'
	                }
	            },
	            data: pizhuArr
	        }
	    ]
	};
	myChart.setOption(option);
}

function indexChart3(nameData,teachArr,askArr,xitiArr,elseArr,noArr){
	var myChart  = echarts.init(document.getElementById("chart"));
	option = {
	    tooltip : {
	        trigger: 'axis',
	        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
	            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
	        }
	    },
	    legend: {
	        data: ['讲授课件时长比例', '提问时长比例','出题时长比例','其他如e时长比例','非如e时长比例']
	    },
	    toolbox: {
	        show : true,
	        feature : {
	            dataView : {show: true, readOnly: false},
	            magicType : {show: true, type: ['line', 'bar']},
	            restore : {show: true},
	            saveAsImage : {show: true}
	        },
	        right:40
	    },
	    grid: {
	        left: '3%',
	        right: '4%',
	        bottom: '3%',
	        containLabel: true
	    },
	    xAxis:  {
	        type: 'value'
	    },
	    yAxis: {
	        type: 'category',
	        data: nameData
	    },
	    series: [
	        {
	            name: '讲授课件时长比例',
	            type: 'bar',
	            stack: '总量',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight'
	                }
	            },
	            data: teachArr
	        },
	        {
	            name: '提问时长比例',
	            type: 'bar',
	            stack: '总量',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight'
	                }
	            },
	            data: askArr
	        },
	        {
	            name: '出题时长比例',
	            type: 'bar',
	            stack: '总量',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight'
	                }
	            },
	            data: xitiArr
	        },
	        {
	            name: '其他如e时长比例',
	            type: 'bar',
	            stack: '总量',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight'
	                }
	            },
	            data: elseArr
	        },
	        {
	            name: '非如e时长比例',
	            type: 'bar',
	            stack: '总量',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight'
	                }
	            },
	            data: noArr
	        }
	    ]
	};	
	myChart.setOption(option);
}

function indexChart4(nameData,interArr,callArr,rewardArr){
	var myChart  = echarts.init(document.getElementById("chart"));

	option = {
	    title : {
	        text: '学校教育均衡度',
//	        subtext: '纯属虚构'
	    },
	    tooltip : {
	        trigger: 'axis'
	    },
	    legend: {
	        data:['课均互动均衡度','课均点名均衡度','课均奖励均衡度']
	    },
	    toolbox: {
	        show : true,
	        feature : {
	            dataView : {show: true, readOnly: false},
	            magicType : {show: true, type: ['line', 'bar']},
	            restore : {show: true},
	            saveAsImage : {show: true}
	        },
	        right:60
	    },
	    calculable : true,
	    xAxis : [
	        {
	            type : 'category',
	            data: nameData
	        }
	    ],
	    yAxis : [
	        {
	            type : 'value'
	        }
	    ],
	    series : [
	        {
	            name:'课均互动均衡度',
	            type:'bar',
	            data:interArr,
	            markPoint : {
	                data : [
	                    {type : 'max', name: '最大值'},
	                    {type : 'min', name: '最小值'}
	                ]
	            },
	            markLine : {
	                data : [
	                    {type : 'average', name: '平均值'}
	                ]
	            }
	        },
	        {
	            name:'课均点名均衡度',
	            type:'bar',
	            data:callArr,
	            markPoint : {
	                data : [
	                    {type : 'max', name: '最大值'},
	                    {type : 'min', name: '最小值'}
	                ]
	            },
	            markLine : {
	                data : [
	                    {type : 'average', name : '平均值'}
	                ]
	            }
	        },
	        {
	            name:'课均奖励均衡度',
	            type:'bar',
	            data:rewardArr,
	            markPoint : {
	                data : [
	                    {type : 'max', name: '最大值'},
	                    {type : 'min', name: '最小值'}
	                ]
	            },
	            markLine : {
	                data : [
	                    {type : 'average', name : '平均值'}
	                ]
	            }
	        }
	    ]
	}

	myChart.setOption(option);
}

function indexChart5(){
	var myChart  = echarts.init(document.getElementById("chart"));
	heatmapData=[
	['2017-5-1',0],
	['2017-5-2',65],
	['2017-5-3',73],
	['2017-5-4',393],
	['2017-5-5',82],
	['2017-5-6',83],
	['2017-5-7',0],
	['2017-5-8',0],
	['2017-5-9',182],
	['2017-5-10',78],
	['2017-5-11',68],
	['2017-5-12',199],
	['2017-5-13',95],
	['2017-5-14',0],
	['2017-5-15',0],
	['2017-5-16',202],
	['2017-5-17',197],
	['2017-5-18',68],
	['2017-5-19',90],
	['2017-5-20',292],
	['2017-5-21',0],
	['2017-5-22',0],
	['2017-5-23',580],
	['2017-5-24',77],
	['2017-5-25',85],
	['2017-5-26',591],
	['2017-5-27',75],
	['2017-5-28',0],
	['2017-5-29',0],
	['2017-5-30',74],
	['2017-5-31',70]];
	
	lunarData = [
	['2017-5-1',1,'初六','劳动节'],
	['2017-5-2',1,'初七'],
	['2017-5-3',1,'初八'],
	['2017-5-4',1,'初九','青年节'],
	['2017-5-5',1,'初十','立夏'],
	['2017-5-6',1,'初十一'],
	['2017-5-7',1,'初十二'],
	['2017-5-8',1,'十三'],
	['2017-5-9',1,'十四'],
	['2017-5-10',1,'十五'],
	['2017-5-11',1,'十六'],
	['2017-5-12',1,'十七'],
	['2017-5-13',1,'十八'],
	['2017-5-14',1,'十九'],
	['2017-5-15',1,'二十'],
	['2017-5-16',1,'廿一'],
	['2017-5-17',1,'廿二'],
	['2017-5-18',1,'廿三'],
	['2017-5-19',1,'廿四'],
	['2017-5-20',1,'廿五'],
	['2017-5-21',1,'廿六','小满'],
	['2017-5-22',1,'廿七'],
	['2017-5-23',1,'廿八'],
	['2017-5-24',1,'廿九'],
	['2017-5-25',1,'三十'],
	['2017-5-26',1,'初一'],
	['2017-5-27',1,'初二'],
	['2017-5-28',1,'初三'],
	['2017-5-29',1,'初四'],
	['2017-5-30',1,'初五','端午节'],
	['2017-5-31',1,'初六']];


option = {
    tooltip: {
        formatter: function (params) {
            return '课均互动次数: ' + params.value[1].toFixed(2)/20.0;
        }
    },

    visualMap: {
        show: false,
        min: 0,
        max: 300,
        calculable: true,
        seriesIndex: [2],
        orient: 'horizontal',
        left: 'center',
        bottom: 20,
        inRange: {
            color: ['#e0ffff', '#006edd'],
            opacity: 0.3
        },
        controller: {
            inRange: {
                opacity: 0.5
            }
        }
    },

    calendar: [{
        left: 'center',
        top: 'middle',
        cellSize: [70, 70],
        yearLabel: {show: false},
        orient: 'vertical',
        dayLabel: {
            firstDay: 1,
            nameMap: 'cn'
        },
        monthLabel: {
            show: false
        },
        range: '2017-05'
    }],

    series: [{
        type: 'scatter',
        coordinateSystem: 'calendar',
        symbolSize: 1,
        label: {
            normal: {
                show: true,
                formatter: function (params) {
                    var d = echarts.number.parseDate(params.value[0]);
                    return d.getDate() + '\n\n' + params.value[2] + '\n\n';
                },
                textStyle: {
                    color: '#000'
                }
            }
        },
        data: lunarData
    }, {
        type: 'scatter',
        coordinateSystem: 'calendar',
        symbolSize: 1,
        label: {
            normal: {
                show: true,
                formatter: function (params) {
                    return '\n\n\n' + (params.value[3] || '');
                },
                textStyle: {
                    fontSize: 14,
                    fontWeight: 700,
                    color: '#a00'
                }
            }
        },
        data: lunarData
    }, {
        name: '课堂互动情况',
        type: 'heatmap',
        coordinateSystem: 'calendar',
        data: heatmapData
    }]
};	
	myChart.setOption(option);
}

function indexChart6(){
	var myChart  = echarts.init(document.getElementById("chart"));
	dateList=[
	['2017-1-1','初四'],
	['2017-1-2','初五'],
	['2017-1-3','初六'],
	['2017-1-4','初七'],
	['2017-1-5','初八','小寒'],
	['2017-1-6','初九'],
	['2017-1-7','初十'],
	['2017-1-8','十一'],
	['2017-1-9','十二'],
	['2017-1-10','十三'],
	['2017-1-11','十四'],
	['2017-1-12','十五'],
	['2017-1-13','十六'],
	['2017-1-14','十七'],
	['2017-1-15','十八'],
	['2017-1-16','十九'],
	['2017-1-17','二十'],
	['2017-1-18','廿一'],
	['2017-1-19','廿二'],
	['2017-1-20','廿三','大寒'],
	['2017-1-21','廿四'],
	['2017-1-22','廿五'],
	['2017-1-23','廿六'],
	['2017-1-24','廿七'],
	['2017-1-25','廿八'],
	['2017-1-26','廿九'],
	['2017-1-27','三十'],
	['2017-1-28','正月'],
	['2017-1-29','初二'],
	['2017-1-30','初三'],
	['2017-1-31','初四']];
	
	heatmapData=[
	['2017-1-1',0],
	['2017-1-2',65],
	['2017-1-3',73],
	['2017-1-4',293],
	['2017-1-5',82],
	['2017-1-6',83],
	['2017-1-7',0],
	['2017-1-8',0],
	['2017-1-9',182],
	['2017-1-10',78],
	['2017-1-11',68],
	['2017-1-12',199],
	['2017-1-13',95],
	['2017-1-14',0],
	['2017-1-15',0],
	['2017-1-16',202],
	['2017-1-17',197],
	['2017-1-18',68],
	['2017-1-19',90],
	['2017-1-20',292],
	['2017-1-21',0],
	['2017-1-22',0],
	['2017-1-23',380],
	['2017-1-24',77],
	['2017-1-25',85],
	['2017-1-26',391],
	['2017-1-27',75],
	['2017-1-28',0],
	['2017-1-29',0],
	['2017-1-30',74],
	['2017-1-31',70]];
	
	lunarData=[
	['2017-1-1',1,'初四'],
	['2017-1-2',1,'初五'],
	['2017-1-3',1,'初六'],
	['2017-1-4',1,'初七'],
	['2017-1-5',1,'初八','小寒'],
	['2017-1-6',1,'初九'],
	['2017-1-7',1,'初十'],
	['2017-1-8',1,'十一'],
	['2017-1-9',1,'十二'],
	['2017-1-10',1,'十三'],
	['2017-1-11',1,'十四'],
	['2017-1-12',1,'十五'],
	['2017-1-13',1,'十六'],
	['2017-1-14',1,'十七'],
	['2017-1-15',1,'十八'],
	['2017-1-16',1,'十九'],
	['2017-1-17',1,'二十'],
	['2017-1-18',1,'廿一'],
	['2017-1-19',1,'廿二'],
	['2017-1-20',1,'廿三','大寒'],
	['2017-1-21',1,'廿四'],
	['2017-1-22',1,'廿五'],
	['2017-1-23',1,'廿六'],
	['2017-1-24',1,'廿七'],
	['2017-1-25',1,'廿八'],
	['2017-1-26',1,'廿九'],
	['2017-1-27',1,'三十'],
	['2017-1-28',1,'正月'],
	['2017-1-29',1,'初二'],
	['2017-1-30',1,'初三'],
	['2017-1-31',1,'初四']];
	
	option = {
	    tooltip: {
	        formatter: function (params) {
	            return '课均不活跃学生数:' + params.value[1].toFixed(2)/10.0;
	        }
	    },
	
	    visualMap: {
	        show: false,
	        min: 0,
	        max: 300,
	        calculable: true,
	        seriesIndex: [2],
	        orient: 'horizontal',
	        left: 'center',
	        bottom: 20,
	        inRange: {
	            color: ['#e0ffff', '#006edd'],
	            opacity: 0.3
	        },
	        controller: {
	            inRange: {
	                opacity: 0.5
	            }
	        }
	    },
	
	    calendar: [{
	        left: 'center',
	        top: 'middle',
	        cellSize: [70, 70],
	        yearLabel: {show: false},
	        orient: 'vertical',
	        dayLabel: {
	            firstDay: 1,
	            nameMap: 'cn'
	        },
	        monthLabel: {
	            show: false
	        },
	        range: '2017-01'
	    }],
	
	    series: [{
	        type: 'scatter',
	        coordinateSystem: 'calendar',
	        symbolSize: 1,
	        label: {
	            normal: {
	                show: true,
	                formatter: function (params) {
	                    var d = echarts.number.parseDate(params.value[0]);
	                    return d.getDate() + '\n\n' + params.value[2] + '\n\n';
	                },
	                textStyle: {
	                    color: '#000'
	                }
	            }
	        },
	        data: lunarData
	    }, {
	        type: 'scatter',
	        coordinateSystem: 'calendar',
	        symbolSize: 1,
	        label: {
	            normal: {
	                show: true,
	                formatter: function (params) {
	                    return '\n\n\n' + (params.value[3] || '');
	                },
	                textStyle: {
	                    fontSize: 14,
	                    fontWeight: 700,
	                    color: '#a00'
	                }
	            }
	        },
	        data: lunarData
	    }, {
	        name: '课堂不活跃情况',
	        type: 'heatmap',
	        coordinateSystem: 'calendar',
	        data: heatmapData
	    }]
	};	
	myChart.setOption(option);
}
