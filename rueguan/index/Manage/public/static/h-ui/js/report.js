function indexChart(data,hours,days){
	var myChart  = echarts.init(document.getElementById("chart"));
	option = {
		graphic: [{
	        type: 'group',
	        left: '1%',
	        top: '89%',
	        children: [
	            {
	            type: 'text',
	            z: 100,
	            left: 'center',
	            top: 'middle',
	            style: {
	                fill: '#333',
	                text: [
	                    '',
	                    '1)  此图的纵轴表示授课科目，横轴上每个散点表示一个班级，散点所在单轴坐标表示班级学期累计如e课时数，散点的大小表示班级科目的课均积分大小。',
	                    '',
	                    '2)  在每个科目上，圆圈越靠右表示班级的科目累计如e课时数较多，圆圈半径越大表示教师的课均积分越多使用如e智慧教学系统越充分。'
	                    ].join('\n'),
	                font: '10px Microsoft YaHei'
	                }
	            }
	        ]
	    }],
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
	        top: (idx * 85 / days.length + 7) + '%',
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
	        top: (idx * 85 / days.length + 5) + '%',
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
		graphic: [{
	        type: 'group',
	        left: '1%',
	        top: '89%',
	        children: [
	            {
	            type: 'text',
	            z: 100,
	            left: 'center',
	            top: 'middle',
	            style: {
	                fill: '#333',
	                text: [
	                    '',
	                    '1)  此图的纵轴表示授课科目，横轴上每个散点表示一个班级，散点所在单轴坐标表示班级学期累计如e课时数，散点的大小表示班级科目的课均积分大小。',
	                    '',
	                    '2)  在每个科目上，圆圈越靠右表示班级的科目累计如e课时数较多，圆圈半径越大表示教师的课均积分越多使用如e智慧教学系统越充分。'
	                    ].join('\n'),
	                font: '10px Microsoft YaHei'
	                }
	            }
	        ]
	    }],
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
	        bottom: '15%',
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
		graphic: [{
	        type: 'group',
	        left: '1%',
	        top: '89%',
	        children: [
	            {
	            type: 'text',
	            z: 100,
	            left: 'center',
	            top: 'middle',
	            style: {
	                fill: '#333',
	                text: [
	                    '',
	                    '1)  此图的纵轴表示授课科目，横轴上每个散点表示一个班级，散点所在单轴坐标表示班级学期累计如e课时数，散点的大小表示班级科目的课均积分大小。',
	                    '',
	                    '2)  在每个科目上，圆圈越靠右表示班级的科目累计如e课时数较多，圆圈半径越大表示教师的课均积分越多使用如e智慧教学系统越充分。'
	                    ].join('\n'),
	                font: '10px Microsoft YaHei'
	                }
	            }
	        ]
	    }],
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
	        bottom: '15%',
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
//	    title : {
//	        text: '学校教育均衡度',
////	        subtext: '纯属虚构'
//	    },
		graphic: [{
	        type: 'group',
	        left: '1%',
	        top: '89%',
	        children: [
	            {
	            type: 'text',
	            z: 100,
	            left: 'center',
	            top: 'middle',
	            style: {
	                fill: '#333',
	                text: [
	                    '',
	                    '1)  此图的纵轴表示授课科目，横轴上每个散点表示一个班级，散点所在单轴坐标表示班级学期累计如e课时数，散点的大小表示班级科目的课均积分大小。',
	                    '',
	                    '2)  在每个科目上，圆圈越靠右表示班级的科目累计如e课时数较多，圆圈半径越大表示教师的课均积分越多使用如e智慧教学系统越充分。'
	                    ].join('\n'),
	                font: '10px Microsoft YaHei'
	                }
	            }
	        ]
	    }],
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
	    grid: {
	        left: '3%',
	        right: '4%',
	        bottom: '15%',
	        containLabel: true
	    },
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

function indexChart5(nameArr,takepartArr,balanceArr){
	var myChart  = echarts.init(document.getElementById("chart"));
	
	option = {
		graphic: [{
	        type: 'group',
	        left: '1%',
	        top: '89%',
	        children: [
	            {
	            type: 'text',
	            z: 100,
	            left: 'center',
	            top: 'middle',
	            style: {
	                fill: '#333',
	                text: [
	                    '',
	                    '1)  此图的纵轴表示授课科目，横轴上每个散点表示一个班级，散点所在单轴坐标表示班级学期累计如e课时数，散点的大小表示班级科目的课均积分大小。',
	                    '',
	                    '2)  在每个科目上，圆圈越靠右表示班级的科目累计如e课时数较多，圆圈半径越大表示教师的课均积分越多使用如e智慧教学系统越充分。'
	                    ].join('\n'),
	                font: '10px Microsoft YaHei'
	                }
	            }
	        ]
	    }],
	    title: {
	        text: ''
	    },
	    color:
	      ['#2f4554', '#61a0a8', '#c23531','#d48265', '#91c7ae','#749f83',  '#ca8622', '#bda29a','#6e7074', '#546570', '#c4ccd3']  
	    ,
	    tooltip: {
	        trigger: 'axis'
	    },
	    legend: {
	        data:['课均互动参与度', '课均参与互动均衡度']
	    },
	     grid: {
	        left: '3%',
	        right: '4%',
	        bottom: '15%',
	        containLabel: true
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
	    xAxis: {
	        type: 'category',
	        data: nameArr
	    },
	    yAxis: {
	        type: 'value'
	    },
	    series: [
	        {
	            name:'课均互动参与度',
	            type:'bar',
	            data: takepartArr,
	            label: {
	                normal: {
	                    show: true,
	                    position: 'top'
	                }
	            }
	        },
	        {
	            name:'课均参与互动均衡度',
	            type:'bar',
	            data: balanceArr,
	            label: {
	                normal: {
	                    show: true,
	                    position: 'top'
	                }
	            }
	        }
	    ]
	};
	myChart.setOption(option);
}

function indexChart6(nameArr,takepartArr,balanceArr){
	var myChart  = echarts.init(document.getElementById("chart"));
	option = {
		graphic: [{
	        type: 'group',
	        left: '1%',
	        top: '89%',
	        children: [
	            {
	            type: 'text',
	            z: 100,
	            left: 'center',
	            top: 'middle',
	            style: {
	                fill: '#333',
	                text: [
	                    '',
	                    '1)  此图的纵轴表示授课科目，横轴上每个散点表示一个班级，散点所在单轴坐标表示班级学期累计如e课时数，散点的大小表示班级科目的课均积分大小。',
	                    '',
	                    '2)  在每个科目上，圆圈越靠右表示班级的科目累计如e课时数较多，圆圈半径越大表示教师的课均积分越多使用如e智慧教学系统越充分。'
	                    ].join('\n'),
	                font: '10px Microsoft YaHei'
	                }
	            }
	        ]
	    }],
	    title: {
	        text: ''
	    },
	    color:
	      ['#2f4554', '#61a0a8', '#c23531','#d48265', '#91c7ae','#749f83',  '#ca8622', '#bda29a','#6e7074', '#546570', '#c4ccd3']  
	    ,
	    tooltip: {
	        trigger: 'axis'
	    },
	    legend: {
	        data:['课均互动参与度', '课均参与互动均衡度']
	    },
	     grid: {
	        left: '3%',
	        right: '4%',
	        bottom: '15%',
	        containLabel: true
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
	    xAxis: {
	        type: 'category',
	        data: nameArr
	    },
	    yAxis: {
	        type: 'value'
	    },
	    series: [
	        {
	            name:'课均互动参与度',
	            type:'bar',
	            data: takepartArr,
	            label: {
	                normal: {
	                    show: true,
	                    position: 'top'
	                }
	            }
	        },
	        {
	            name:'课均参与互动均衡度',
	            type:'bar',
	            data: balanceArr,
	            label: {
	                normal: {
	                    show: true,
	                    position: 'top'
	                }
	            }
	        }
	    ]
	};
	myChart.setOption(option);
}
