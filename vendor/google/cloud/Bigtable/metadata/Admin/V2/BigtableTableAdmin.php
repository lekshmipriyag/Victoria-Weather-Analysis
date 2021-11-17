<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/bigtable/admin/v2/bigtable_table_admin.proto

namespace GPBMetadata\Google\Bigtable\Admin\V2;

class BigtableTableAdmin
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Bigtable\Admin\V2\Table::initOnce();
        \GPBMetadata\Google\Iam\V1\IamPolicy::initOnce();
        \GPBMetadata\Google\Iam\V1\Policy::initOnce();
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0aee350a33676f6f676c652f6269677461626c652f61646d696e2f76322f" .
            "6269677461626c655f7461626c655f61646d696e2e70726f746f1218676f" .
            "6f676c652e6269677461626c652e61646d696e2e76321a17676f6f676c65" .
            "2f6170692f636c69656e742e70726f746f1a1f676f6f676c652f6170692f" .
            "6669656c645f6265686176696f722e70726f746f1a19676f6f676c652f61" .
            "70692f7265736f757263652e70726f746f1a24676f6f676c652f62696774" .
            "61626c652f61646d696e2f76322f7461626c652e70726f746f1a1e676f6f" .
            "676c652f69616d2f76312f69616d5f706f6c6963792e70726f746f1a1a67" .
            "6f6f676c652f69616d2f76312f706f6c6963792e70726f746f1a23676f6f" .
            "676c652f6c6f6e6772756e6e696e672f6f7065726174696f6e732e70726f" .
            "746f1a1e676f6f676c652f70726f746f6275662f6475726174696f6e2e70" .
            "726f746f1a1b676f6f676c652f70726f746f6275662f656d7074792e7072" .
            "6f746f1a1f676f6f676c652f70726f746f6275662f74696d657374616d70" .
            "2e70726f746f22fc010a124372656174655461626c655265717565737412" .
            "380a06706172656e741801200128094228e04102fa41220a206269677461" .
            "626c652e676f6f676c65617069732e636f6d2f496e7374616e636512150a" .
            "087461626c655f69641802200128094203e0410212330a057461626c6518" .
            "032001280b321f2e676f6f676c652e6269677461626c652e61646d696e2e" .
            "76322e5461626c654203e04102124a0a0e696e697469616c5f73706c6974" .
            "7318042003280b32322e676f6f676c652e6269677461626c652e61646d69" .
            "6e2e76322e4372656174655461626c65526571756573742e53706c69741a" .
            "140a0553706c6974120b0a036b657918012001280c22b4010a1e43726561" .
            "74655461626c6546726f6d536e617073686f745265717565737412380a06" .
            "706172656e741801200128094228e04102fa41220a206269677461626c65" .
            "2e676f6f676c65617069732e636f6d2f496e7374616e636512150a087461" .
            "626c655f69641802200128094203e0410212410a0f736f757263655f736e" .
            "617073686f741803200128094228e04102fa41220a206269677461626c65" .
            "2e676f6f676c65617069732e636f6d2f536e617073686f742294010a1344" .
            "726f70526f7752616e67655265717565737412330a046e616d6518012001" .
            "28094225e04102fa411f0a1d6269677461626c652e676f6f676c65617069" .
            "732e636f6d2f5461626c6512180a0e726f775f6b65795f70726566697818" .
            "022001280c480012240a1a64656c6574655f616c6c5f646174615f66726f" .
            "6d5f7461626c65180320012808480042080a0674617267657422a8010a11" .
            "4c6973745461626c65735265717565737412380a06706172656e74180120" .
            "0128094228e04102fa41220a206269677461626c652e676f6f676c656170" .
            "69732e636f6d2f496e7374616e636512320a047669657718022001280e32" .
            "242e676f6f676c652e6269677461626c652e61646d696e2e76322e546162" .
            "6c652e5669657712110a09706167655f73697a6518042001280512120a0a" .
            "706167655f746f6b656e180320012809225e0a124c6973745461626c6573" .
            "526573706f6e7365122f0a067461626c657318012003280b321f2e676f6f" .
            "676c652e6269677461626c652e61646d696e2e76322e5461626c6512170a" .
            "0f6e6578745f706167655f746f6b656e180220012809227a0a0f47657454" .
            "61626c655265717565737412330a046e616d651801200128094225e04102" .
            "fa411f0a1d6269677461626c652e676f6f676c65617069732e636f6d2f54" .
            "61626c6512320a047669657718022001280e32242e676f6f676c652e6269" .
            "677461626c652e61646d696e2e76322e5461626c652e5669657722490a12" .
            "44656c6574655461626c655265717565737412330a046e616d6518012001" .
            "28094225e04102fa411f0a1d6269677461626c652e676f6f676c65617069" .
            "732e636f6d2f5461626c6522da020a1b4d6f64696679436f6c756d6e4661" .
            "6d696c6965735265717565737412330a046e616d651801200128094225e0" .
            "4102fa411f0a1d6269677461626c652e676f6f676c65617069732e636f6d" .
            "2f5461626c65125e0a0d6d6f64696669636174696f6e7318022003280b32" .
            "422e676f6f676c652e6269677461626c652e61646d696e2e76322e4d6f64" .
            "696679436f6c756d6e46616d696c696573526571756573742e4d6f646966" .
            "69636174696f6e4203e041021aa5010a0c4d6f64696669636174696f6e12" .
            "0a0a02696418012001280912380a0663726561746518022001280b32262e" .
            "676f6f676c652e6269677461626c652e61646d696e2e76322e436f6c756d" .
            "6e46616d696c79480012380a0675706461746518032001280b32262e676f" .
            "6f676c652e6269677461626c652e61646d696e2e76322e436f6c756d6e46" .
            "616d696c794800120e0a0464726f70180420012808480042050a036d6f64" .
            "22560a1f47656e6572617465436f6e73697374656e6379546f6b656e5265" .
            "717565737412330a046e616d651801200128094225e04102fa411f0a1d62" .
            "69677461626c652e676f6f676c65617069732e636f6d2f5461626c65223d" .
            "0a2047656e6572617465436f6e73697374656e6379546f6b656e52657370" .
            "6f6e736512190a11636f6e73697374656e63795f746f6b656e1801200128" .
            "09226e0a17436865636b436f6e73697374656e6379526571756573741233" .
            "0a046e616d651801200128094225e04102fa411f0a1d6269677461626c65" .
            "2e676f6f676c65617069732e636f6d2f5461626c65121e0a11636f6e7369" .
            "7374656e63795f746f6b656e1802200128094203e04102222e0a18436865" .
            "636b436f6e73697374656e6379526573706f6e736512120a0a636f6e7369" .
            "7374656e7418012001280822dc010a14536e617073686f745461626c6552" .
            "65717565737412330a046e616d651801200128094225e04102fa411f0a1d" .
            "6269677461626c652e676f6f676c65617069732e636f6d2f5461626c6512" .
            "380a07636c75737465721802200128094227e04102fa41210a1f62696774" .
            "61626c652e676f6f676c65617069732e636f6d2f436c757374657212180a" .
            "0b736e617073686f745f69641803200128094203e0410212260a0374746c" .
            "18042001280b32192e676f6f676c652e70726f746f6275662e4475726174" .
            "696f6e12130a0b6465736372697074696f6e180520012809224c0a124765" .
            "74536e617073686f745265717565737412360a046e616d65180120012809" .
            "4228e04102fa41220a206269677461626c652e676f6f676c65617069732e" .
            "636f6d2f536e617073686f7422760a144c697374536e617073686f747352" .
            "65717565737412370a06706172656e741801200128094227e04102fa4121" .
            "0a1f6269677461626c652e676f6f676c65617069732e636f6d2f436c7573" .
            "74657212110a09706167655f73697a6518022001280512120a0a70616765" .
            "5f746f6b656e18032001280922670a154c697374536e617073686f747352" .
            "6573706f6e736512350a09736e617073686f747318012003280b32222e67" .
            "6f6f676c652e6269677461626c652e61646d696e2e76322e536e61707368" .
            "6f7412170a0f6e6578745f706167655f746f6b656e180220012809224f0a" .
            "1544656c657465536e617073686f745265717565737412360a046e616d65" .
            "1801200128094228e04102fa41220a206269677461626c652e676f6f676c" .
            "65617069732e636f6d2f536e617073686f7422c4010a15536e617073686f" .
            "745461626c654d6574616461746112480a106f726967696e616c5f726571" .
            "7565737418012001280b322e2e676f6f676c652e6269677461626c652e61" .
            "646d696e2e76322e536e617073686f745461626c65526571756573741230" .
            "0a0c726571756573745f74696d6518022001280b321a2e676f6f676c652e" .
            "70726f746f6275662e54696d657374616d70122f0a0b66696e6973685f74" .
            "696d6518032001280b321a2e676f6f676c652e70726f746f6275662e5469" .
            "6d657374616d7022d8010a1f4372656174655461626c6546726f6d536e61" .
            "7073686f744d6574616461746112520a106f726967696e616c5f72657175" .
            "65737418012001280b32382e676f6f676c652e6269677461626c652e6164" .
            "6d696e2e76322e4372656174655461626c6546726f6d536e617073686f74" .
            "5265717565737412300a0c726571756573745f74696d6518022001280b32" .
            "1a2e676f6f676c652e70726f746f6275662e54696d657374616d70122f0a" .
            "0b66696e6973685f74696d6518032001280b321a2e676f6f676c652e7072" .
            "6f746f6275662e54696d657374616d7032e91b0a124269677461626c6554" .
            "61626c6541646d696e12ab010a0b4372656174655461626c65122c2e676f" .
            "6f676c652e6269677461626c652e61646d696e2e76322e43726561746554" .
            "61626c65526571756573741a1f2e676f6f676c652e6269677461626c652e" .
            "61646d696e2e76322e5461626c65224d82d3e493022f222a2f76322f7b70" .
            "6172656e743d70726f6a656374732f2a2f696e7374616e6365732f2a7d2f" .
            "7461626c65733a012ada4115706172656e742c7461626c655f69642c7461" .
            "626c65128a020a174372656174655461626c6546726f6d536e617073686f" .
            "7412382e676f6f676c652e6269677461626c652e61646d696e2e76322e43" .
            "72656174655461626c6546726f6d536e617073686f74526571756573741a" .
            "1d2e676f6f676c652e6c6f6e6772756e6e696e672e4f7065726174696f6e" .
            "22950182d3e4930242223d2f76322f7b706172656e743d70726f6a656374" .
            "732f2a2f696e7374616e6365732f2a7d2f7461626c65733a637265617465" .
            "46726f6d536e617073686f743a012ada411f706172656e742c7461626c65" .
            "5f69642c736f757263655f736e617073686f74ca41280a055461626c6512" .
            "1f4372656174655461626c6546726f6d536e617073686f744d6574616461" .
            "746112a4010a0a4c6973745461626c6573122b2e676f6f676c652e626967" .
            "7461626c652e61646d696e2e76322e4c6973745461626c65735265717565" .
            "73741a2c2e676f6f676c652e6269677461626c652e61646d696e2e76322e" .
            "4c6973745461626c6573526573706f6e7365223b82d3e493022c122a2f76" .
            "322f7b706172656e743d70726f6a656374732f2a2f696e7374616e636573" .
            "2f2a7d2f7461626c6573da4106706172656e741291010a08476574546162" .
            "6c6512292e676f6f676c652e6269677461626c652e61646d696e2e76322e" .
            "4765745461626c65526571756573741a1f2e676f6f676c652e6269677461" .
            "626c652e61646d696e2e76322e5461626c65223982d3e493022c122a2f76" .
            "322f7b6e616d653d70726f6a656374732f2a2f696e7374616e6365732f2a" .
            "2f7461626c65732f2a7dda41046e616d65128e010a0b44656c6574655461" .
            "626c65122c2e676f6f676c652e6269677461626c652e61646d696e2e7632" .
            "2e44656c6574655461626c65526571756573741a162e676f6f676c652e70" .
            "726f746f6275662e456d707479223982d3e493022c2a2a2f76322f7b6e61" .
            "6d653d70726f6a656374732f2a2f696e7374616e6365732f2a2f7461626c" .
            "65732f2a7dda41046e616d6512cf010a144d6f64696679436f6c756d6e46" .
            "616d696c69657312352e676f6f676c652e6269677461626c652e61646d69" .
            "6e2e76322e4d6f64696679436f6c756d6e46616d696c6965735265717565" .
            "73741a1f2e676f6f676c652e6269677461626c652e61646d696e2e76322e" .
            "5461626c65225f82d3e4930244223f2f76322f7b6e616d653d70726f6a65" .
            "6374732f2a2f696e7374616e6365732f2a2f7461626c65732f2a7d3a6d6f" .
            "64696679436f6c756d6e46616d696c6965733a012ada41126e616d652c6d" .
            "6f64696669636174696f6e731299010a0c44726f70526f7752616e676512" .
            "2d2e676f6f676c652e6269677461626c652e61646d696e2e76322e44726f" .
            "70526f7752616e6765526571756573741a162e676f6f676c652e70726f74" .
            "6f6275662e456d707479224282d3e493023c22372f76322f7b6e616d653d" .
            "70726f6a656374732f2a2f696e7374616e6365732f2a2f7461626c65732f" .
            "2a7d3a64726f70526f7752616e67653a012a12e8010a1847656e65726174" .
            "65436f6e73697374656e6379546f6b656e12392e676f6f676c652e626967" .
            "7461626c652e61646d696e2e76322e47656e6572617465436f6e73697374" .
            "656e6379546f6b656e526571756573741a3a2e676f6f676c652e62696774" .
            "61626c652e61646d696e2e76322e47656e6572617465436f6e7369737465" .
            "6e6379546f6b656e526573706f6e7365225582d3e493024822432f76322f" .
            "7b6e616d653d70726f6a656374732f2a2f696e7374616e6365732f2a2f74" .
            "61626c65732f2a7d3a67656e6572617465436f6e73697374656e6379546f" .
            "6b656e3a012ada41046e616d6512da010a10436865636b436f6e73697374" .
            "656e637912312e676f6f676c652e6269677461626c652e61646d696e2e76" .
            "322e436865636b436f6e73697374656e6379526571756573741a322e676f" .
            "6f676c652e6269677461626c652e61646d696e2e76322e436865636b436f" .
            "6e73697374656e6379526573706f6e7365225f82d3e4930240223b2f7632" .
            "2f7b6e616d653d70726f6a656374732f2a2f696e7374616e6365732f2a2f" .
            "7461626c65732f2a7d3a636865636b436f6e73697374656e63793a012ada" .
            "41166e616d652c636f6e73697374656e63795f746f6b656e12ea010a0d53" .
            "6e617073686f745461626c65122e2e676f6f676c652e6269677461626c65" .
            "2e61646d696e2e76322e536e617073686f745461626c6552657175657374" .
            "1a1d2e676f6f676c652e6c6f6e6772756e6e696e672e4f7065726174696f" .
            "6e22890182d3e493023822332f76322f7b6e616d653d70726f6a65637473" .
            "2f2a2f696e7374616e6365732f2a2f7461626c65732f2a7d3a736e617073" .
            "686f743a012ada41246e616d652c636c75737465722c736e617073686f74" .
            "5f69642c6465736372697074696f6eca41210a08536e617073686f741215" .
            "536e617073686f745461626c654d6574616461746112a8010a0b47657453" .
            "6e617073686f74122c2e676f6f676c652e6269677461626c652e61646d69" .
            "6e2e76322e476574536e617073686f74526571756573741a222e676f6f67" .
            "6c652e6269677461626c652e61646d696e2e76322e536e617073686f7422" .
            "4782d3e493023a12382f76322f7b6e616d653d70726f6a656374732f2a2f" .
            "696e7374616e6365732f2a2f636c7573746572732f2a2f736e617073686f" .
            "74732f2a7dda41046e616d6512bb010a0d4c697374536e617073686f7473" .
            "122e2e676f6f676c652e6269677461626c652e61646d696e2e76322e4c69" .
            "7374536e617073686f7473526571756573741a2f2e676f6f676c652e6269" .
            "677461626c652e61646d696e2e76322e4c697374536e617073686f747352" .
            "6573706f6e7365224982d3e493023a12382f76322f7b706172656e743d70" .
            "726f6a656374732f2a2f696e7374616e6365732f2a2f636c757374657273" .
            "2f2a7d2f736e617073686f7473da4106706172656e7412a2010a0e44656c" .
            "657465536e617073686f74122f2e676f6f676c652e6269677461626c652e" .
            "61646d696e2e76322e44656c657465536e617073686f7452657175657374" .
            "1a162e676f6f676c652e70726f746f6275662e456d707479224782d3e493" .
            "023a2a382f76322f7b6e616d653d70726f6a656374732f2a2f696e737461" .
            "6e6365732f2a2f636c7573746572732f2a2f736e617073686f74732f2a7d" .
            "da41046e616d65129c010a0c47657449616d506f6c69637912222e676f6f" .
            "676c652e69616d2e76312e47657449616d506f6c69637952657175657374" .
            "1a152e676f6f676c652e69616d2e76312e506f6c696379225182d3e49302" .
            "40223b2f76322f7b7265736f757263653d70726f6a656374732f2a2f696e" .
            "7374616e6365732f2a2f7461626c65732f2a7d3a67657449616d506f6c69" .
            "63793a012ada41087265736f7572636512f3010a0c53657449616d506f6c" .
            "69637912222e676f6f676c652e69616d2e76312e53657449616d506f6c69" .
            "6379526571756573741a152e676f6f676c652e69616d2e76312e506f6c69" .
            "637922a70182d3e493028e01223b2f76322f7b7265736f757263653d7072" .
            "6f6a656374732f2a2f696e7374616e6365732f2a2f7461626c65732f2a7d" .
            "3a73657449616d506f6c6963793a012a5a4c22472f76322f7b7265736f75" .
            "7263653d70726f6a656374732f2a2f696e7374616e6365732f2a2f636c75" .
            "73746572732f2a2f6261636b7570732f2a7d3a73657449616d506f6c6963" .
            "793a012ada410f7265736f757263652c706f6c69637912a4020a12546573" .
            "7449616d5065726d697373696f6e7312282e676f6f676c652e69616d2e76" .
            "312e5465737449616d5065726d697373696f6e73526571756573741a292e" .
            "676f6f676c652e69616d2e76312e5465737449616d5065726d697373696f" .
            "6e73526573706f6e736522b80182d3e493029a0122412f76322f7b726573" .
            "6f757263653d70726f6a656374732f2a2f696e7374616e6365732f2a2f74" .
            "61626c65732f2a7d3a7465737449616d5065726d697373696f6e733a012a" .
            "5a52224d2f76322f7b7265736f757263653d70726f6a656374732f2a2f69" .
            "6e7374616e6365732f2a2f636c7573746572732f2a2f6261636b7570732f" .
            "2a7d3a7465737449616d5065726d697373696f6e733a012ada4114726573" .
            "6f757263652c7065726d697373696f6e731ade02ca411c6269677461626c" .
            "6561646d696e2e676f6f676c65617069732e636f6dd241bb026874747073" .
            "3a2f2f7777772e676f6f676c65617069732e636f6d2f617574682f626967" .
            "7461626c652e61646d696e2c68747470733a2f2f7777772e676f6f676c65" .
            "617069732e636f6d2f617574682f6269677461626c652e61646d696e2e74" .
            "61626c652c68747470733a2f2f7777772e676f6f676c65617069732e636f" .
            "6d2f617574682f636c6f75642d6269677461626c652e61646d696e2c6874" .
            "7470733a2f2f7777772e676f6f676c65617069732e636f6d2f617574682f" .
            "636c6f75642d6269677461626c652e61646d696e2e7461626c652c687474" .
            "70733a2f2f7777772e676f6f676c65617069732e636f6d2f617574682f63" .
            "6c6f75642d706c6174666f726d2c68747470733a2f2f7777772e676f6f67" .
            "6c65617069732e636f6d2f617574682f636c6f75642d706c6174666f726d" .
            "2e726561642d6f6e6c7942ba010a1c636f6d2e676f6f676c652e62696774" .
            "61626c652e61646d696e2e763242174269677461626c655461626c654164" .
            "6d696e50726f746f50015a3d676f6f676c652e676f6c616e672e6f72672f" .
            "67656e70726f746f2f676f6f676c65617069732f6269677461626c652f61" .
            "646d696e2f76323b61646d696eaa021e476f6f676c652e436c6f75642e42" .
            "69677461626c652e41646d696e2e5632ca021e476f6f676c655c436c6f75" .
            "645c4269677461626c655c41646d696e5c5632620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}

